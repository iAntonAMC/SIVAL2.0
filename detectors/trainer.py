import cv2
import os
import numpy as np


dataPath = 'data'
peopleList = os.listdir(dataPath)
print('Students List: ', peopleList)

labels = []  # Se le añade un valor de 'label' por cada escaneo realizado
facesData = []  # Array que almacenará la data de cada persona en peopleList
label = 0  # Acumulador que itera con cada revisión de persona en peopleList


for nameDir in peopleList:
	personPath = dataPath + '/' + nameDir
	print('Getting frames...')

	for fileName in os.listdir(personPath):
		print('Recognized: ', nameDir + '/' + fileName)
		labels.append(label)
		facesData.append(cv2.imread(personPath + '/' + fileName, 0)) 
		image = cv2.imread(personPath + '/' + fileName, 0)
	label += 1


# Métodos para entrenar el recognizer:
print("Getting model type... ")
#face_recognizer = cv2.face.EigenFaceRecognizer_create()
#face_recognizer = cv2.face.FisherFaceRecognizer_create()
face_recognizer = cv2.face.LBPHFaceRecognizer_create()

# Entrenar el modelo:
print("Training... ")
face_recognizer.train(facesData, np.array(labels))

# Guardar el modelo obtenido
#face_recognizer.write('modeloEigenFace.xml')
#face_recognizer.write('modeloFisherFace.xml')
face_recognizer.write('modeloLBPHFace.xml')


print(f"Model {face_recognizer} trained")
