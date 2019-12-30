#!pip install opencv-contrib-python
#!pip install PIL

import cv2,os
import numpy as np
from PIL import Image 

recognizer = cv2.face.LBPHFaceRecognizer_create()
cascadePath = "Classifiers/face.xml"
faceCascade = cv2.CascadeClassifier(cascadePath);
path = 'dataSet'

def getImagesAndLabels(path):
    #get the path of all the files in the folder
    imagePaths=[os.path.join(path,f) for f in os.listdir(path)] 
    #create empth face list
    #faceSamples=[]
    faces=[]
    #create empty ID list
    Ids=[]
    #now looping through all the image paths and loading the Ids and the images
    for imagePath in imagePaths:
        #loading the image and converting it to gray scale
        pilImage=Image.open(imagePath).convert('L')
        #Now we are converting the PIL image into numpy array
        imageNp=np.array(pilImage,'uint8')
        #getting the Id from the image
        Id=int(os.path.split(imagePath)[-1].split(".")[1])
        # extract the face from the training image sample
        faces.append(imageNp)
        print(Id)
        Ids.append(Id)
        cv2.imshow("training",imageNp)
        cv2.waitKey(10)
        #If a face is there then append that in the list as well as Id of it
        #for (x,y,w,h) in faces:
            #faceSamples.append(imageNp[y:y+h,x:x+w])
            
    return faces,Ids


faces,Ids = getImagesAndLabels(path)
recognizer.train(faces, np.array(Ids))
recognizer.save('trainer/trainer.yml')
