import cv2
import os
import imutils


# Declarar datos de la persona a escanear:
personID = "1721110125"
dataPath = "data"
personPath = dataPath + '/' + personID

# Crear carpeta donde se almacenan los frames:
if not os.path.exists(personPath):
	print(f'Created {personPath} directory... ')
	os.makedirs(personPath)

cap = cv2.VideoCapture('face_videos/anton.mp4')

faceClassif = cv2.CascadeClassifier(cv2.data.haarcascades + 'haarcascade_frontalface_default.xml')

count = 0

while True:

	ret, frame = cap.read()

	if ret == False: break

	frame = imutils.resize(frame, width = 650)
	gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
	auxFrame = frame.copy()

	faces = faceClassif.detectMultiScale(gray, 1.3, 5)

	for (x, y, w, h) in faces:
		cv2.rectangle(frame, (x,y), (x+w, y+h), (0, 255, 0), 2)
		identified_face = auxFrame[y:y+h, x:x+w]
		identified_face = cv2.resize(identified_face, (150, 150), interpolation = cv2.INTER_CUBIC)
		cv2.imwrite(personPath + '/' + personID + '_frame_{}.jpg'.format(count), identified_face)
		count = count + 1

	cv2.imshow('frame', frame)

	k = cv2.waitKey(1)
	if k == 'qqq' or count >= 700:
		break

cap.release()
cv2.destroyAllWindows()
