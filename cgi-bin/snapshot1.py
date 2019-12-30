import cv2
 

camera_port = 0
 

ramp_frames = 20
 

camera = cv2.VideoCapture(camera_port)
 

def get_image():
 
 retval, im = camera.read()
 return im
 
for i in range(ramp_frames):
 temp = get_image()

camera_capture = get_image()
file = "C:/xampp/htdocs/Project/cgi-bin/unknown1/unknown.jpg"

cv2.imwrite(file, camera_capture)
 

del(camera)
