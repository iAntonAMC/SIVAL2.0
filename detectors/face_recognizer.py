import os
import cv2
import firebase_admin
from firebase_admin import credentials
from firebase_admin import db
import time

sdk = credentials.Certificate("sival-db-firebase-adminsdk-acoph-040a661318.json")
firebase_admin.initialize_app(sdk, {'databaseURL':'https://sival-db-default-rtdb.firebaseio.com/'})
collection = db.reference("/recData")
document = collection.child("-NTFoCTGynA-Rox42s3K")
sent = False

def putRecognized(recData):
    try:
        document.update(recData)
        print("Updated")

    except Exception as e:
        raise print(f"Connection ERROR : {e.args}")


dataPath = 'data'
peopleList = os.listdir(dataPath)
print('Students List: ', peopleList)


# Declarar el modelo que se usa:
#face_recognizer = cv2.face.EigenFaceRecognizer_create()
#face_recognizer = cv2.face.FisherFaceRecognizer_create()
face_recognizer = cv2.face.LBPHFaceRecognizer_create()  #escala de grises

# Leer el modelo entrenado:
#face_recognizer.read('modeloEigenFace.xml')
#face_recognizer.read('modeloFisherFace.xml')
face_recognizer.read('modeloLBPHFace.xml')

cap = cv2.VideoCapture(0, cv2.CAP_DSHOW)

faceClassif = cv2.CascadeClassifier(cv2.data.haarcascades+'haarcascade_frontalface_default.xml')

while True:
	ret,frame = cap.read()
	if ret == False: break
	gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
	auxFrame = gray.copy()

	faces = faceClassif.detectMultiScale(gray, 1.3, 5)

	for (x, y, w, h) in faces:
		personID = auxFrame[y:y+h, x:x+w]
		personID = cv2.resize(personID, (150,150), interpolation= cv2.INTER_CUBIC)
		result = face_recognizer.predict(personID)

		cv2.putText(frame,'{}'.format("Scanning..."),(x,y-5),1,1.3,(255,255,0),1,cv2.LINE_AA)

		if result[1] < 60:
			cv2.rectangle(frame, (x, y), (x+w, y+h), (0, 255, 0), 2)
			cv2.putText(frame,'{}'.format(peopleList[result[0]]), (x, y-25), 2, 1.1, (0, 255, 0), 1, cv2.LINE_AA)
			recData = {"last_scan":peopleList[result[0]], "changed":"y"}
			if sent == False:
				putRecognized(recData)
				sent = True
		else:
			cv2.putText(frame,'Desconocido',(x, y-20), 2, 0.8, (0, 0, 255), 1, cv2.LINE_AA)
			cv2.rectangle(frame, (x, y), (x+w, y+h), (0, 0, 255), 2)
			sent = False

	cv2.imshow('frame', frame)

	time.sleep(0.01)

	if (cv2.waitKey(1) == ord('q')):
		break


cap.release()
cv2.destroyAllWindows()
