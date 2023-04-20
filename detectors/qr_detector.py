import cv2
import firebase_admin
from firebase_admin import credentials
from firebase_admin import db
import time

sdk = credentials.Certificate("sival-db-firebase-adminsdk-acoph-040a661318.json")
firebase_admin.initialize_app(sdk, {'databaseURL':'https://sival-db-default-rtdb.firebaseio.com/'})
logs = db.reference("/logs")
sent = False

try:
    visitors = db.reference("/visitors")

    response = visitors.get()

    qr_list = []

    for id in response:
        if (response[id]['qr_status']  == "active"):
            qr_list.append(response[id]['qr_data'])

    print(qr_list)

except Exception as e:
    raise print(f"Connection ERROR : {e.args}")


# Inicializa la pantalla de captura
capture = cv2.VideoCapture(0)

while(capture.isOpened()):
    ret, frame = capture.read()

    if (cv2.waitKey(1) == ord('q') or cv2.waitKey(1) == ord('Q')):
        break

    qrDetector = cv2.QRCodeDetector()
    qr_data, bbox, rectifiedImage = qrDetector.detectAndDecode(frame)

    # Comprueba si fue reconocido algún dato desde el QR 
    if qr_data in qr_list:
        cv2.putText(frame, 'QR Activo', (200, 90), 2, 0.8, (0, 255, 0), 1, cv2.LINE_AA)
        cv2.rectangle(frame, (150, 100), (450, 400), (0, 255, 0), 2)
        cv2.imshow('QR-Scanner', frame)
        for id in response:
            if sent == False:
                if (qr_data == response[id]['qr_data']):
                    logs.push(response[id])
                    sent = True
    elif not qr_data:
        cv2.putText(frame, 'Detecte QR', (200, 90), 2, 0.8, (0, 150, 255), 1, cv2.LINE_AA)
        cv2.rectangle(frame, (150, 100), (450, 400), (0, 150, 255), 2)
        cv2.imshow('QR-Scanner', frame)
    elif not(qr_data in qr_list):
        cv2.putText(frame, 'QR No autorizado', (200, 90), 2, 0.8, (0, 0, 255), 1, cv2.LINE_AA)
        cv2.rectangle(frame, (150, 100), (450, 400), (0, 0, 255), 2)
        cv2.imshow('QR-Scanner', frame)
    time.sleep(0.01)

capture.release()
cv2.destroyAllWindows()
