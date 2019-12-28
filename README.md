# Online Transaction Security Using Face Recognition

This project was developed for final year of BE in Computer Science from Visveswaraiah Technological University. Full report for this project can be found out [here](../Securing-Online-Transaction-using-Face-Recognition/report/Project-Report.docx).

## Problem Statement
There has been no full proof method to “authenticate” a customer in an online credit card transaction. Authentication is the verification of a credit card owner made during a credit card purchase. In the physical world authentication is achieved through a physical signature which is manually checked at the point of sale. Without effective authentication, following problems may arise like fraudulent transaction, lengthy process of transaction including lack of confidence for customers, higher cost of transactions etc.

## Existing Systems
A simple multi-factor authentication setup involves asking a user for their username and password (something they know) as well as verifying their identity through a second factor such as an SMS message to their phone (something they have). That covers two factors of authentication, but adding in image recognition as well adds an extra layer of security to the login process without making it frustrating or overly complicated for authorized users.

## Proposed Solution
In this project, we use standard implementation techniques, face recognition using Local Binary Pattern Histogram algorithm, which has been implemented using OpenCV Python.

* LBPH: (Local Binary Pattern Histogram)

Local Binary Pattern (LBP) is a simple yet very efficient texture operator which labels the pixels of an image by thresholding the neighborhood of each pixel and considers the result as a binary number.
LBP is combined with histograms of oriented gradients (HOG) descriptor, it improves the detection performance considerably on some datasets. 
Parameters: the LBPH uses 4 parameters:
1. Radius
2. Neighbors
3. Grid X
4. Grid Y

Radius: the radius is used to build the circular local binary pattern and represents the radius around the central pixel. It is usually set to 1.

Neighbors: the number of sample points to build the circular local binary pattern. Keep in mind: the more sample points you include, the higher the computational cost. It is usually set to 8.

Grid X: the number of cells in the horizontal direction. The more cells, the finer the grid, the higher the dimensionality of the resulting feature vector. It is usually set to 8.

Grid Y: the number of cells in the vertical direction. The more cells, the finer the grid, the higher the dimensionality of the resulting feature vector. It is usually set to 8.

Training the Algorithm: First, we need to train the algorithm. To do so, we need to use a dataset with the facial images of the people we want to recognize. We need to also set an ID (it may be a number or the name of the person) for each image, so the algorithm will use this information to recognize an input image and give you an output. Images of the same person must have the same ID. With the training set already constructed, let’s see the LBPH computational steps.

Applying the LBP operation: The first computational step of the LBPH is to create an intermediate image that describes the original image in a better way, by highlighting the facial characteristics. To do so, the algorithm uses a concept of a sliding window, based on the parameters radius and neighbors.

Extracting the Histograms: Now, using the image generated in the last step, we can use the Grid X and Grid Y parameters to divide the image into multiple grids

We can use various approaches to compare the histograms (calculate the distance between two histograms), for example: euclidean distance, chi-square, absolute value, etc.

* OpenCV Python

OpenCV-Python is the Python API of OpenCV. It combines the best qualities of OpenCV C++ API and Python language.
Python is a general purpose programming language started by Guido van Rossum, which became very popular in short time mainly because of its simplicity and code readability. It enables the programmer to express his ideas in fewer lines of code without reducing any readability.
Compared to other languages like C/C++, Python is slower. But another important feature of Python is that it can be easily extended with C/C++. This feature helps us to write computationally intensive codes in C/C++ and create a Python wrapper for it so that we can use these wrappers as Python modules. This gives us two advantages: first, our code is as fast as original C/C++ code (since it is the actual C++ code working in background) and second, it is very easy to code in Python. This is how OpenCV-Python works, it is a Python wrapper around original C++ implementation.
And the support of Numpy makes the task more easier. Numpy is a highly optimized library for numerical operations. It gives a MATLAB-style syntax. All the OpenCV array structures are converted to-and-from Numpy arrays. So whatever operations you can do in Numpy, you can combine it with OpenCV, which increases number of weapons in your arsenal. Besides that, several other libraries like  Matplotlib which supports Numpy can be used with this. So OpenCV-Python is an appropriate tool for fast prototyping of computer vision problems.

## Experiments and Results
The prediction percentage and the accuracy of the bounding boxes in the results depends on the:
1. Batch size
2. Learning rate
3. Number of training iterations

Batch size: is the number of images that are trained per batch in one iteration of training.

Learning Rate: is the training parameter that controls the size of weight and bias changes during learning.

Number of Iterations: is the number of training iterations after which the network is optimally trained.

IOU: Intersection over Union is an evaluation metric used to measure the accuracy of an object detector on a particular dataset. In the numerator we compute the area of overlap between the predicted bounding box and the ground-truth bounding box. The denominator is the area of union, or more simply, the area encompassed by both the predicted bounding box and the ground-truth bounding box. Dividing the area of overlap by the area of union yields our final score the Intersection over Union.

* Establishing Optimal parameters
This section deals with experimenting with various training parameters are carried out to decide on an optimal set of parameters.
* Batch Size were set to 64, 8 and 1 and experiments were carried out.

Batch sizes of 64 and 8 took a long time to train and did not produce bounding boxes for object detection.

Batch size 1 proved optimal with a fast training speed and also efficient bounding box predictions when tested

* Learning Rate

1. Learning Rate (0.00001)

![Learning Rate (0.00001)](../Securing-Online-Transaction-using-Face-Recognition/experiment/image018.jpg)
![Learning Rate (0.00001)](../Securing-Online-Transaction-using-Face-Recognition/experiment/image019.jpg)


2. Learning Rate (0.0001)
![Learning Rate (0.0001)](../Securing-Online-Transaction-using-Face-Recognition/experiment/image020.jpg)
![Learning Rate (0.0001)](../Securing-Online-Transaction-using-Face-Recognition/experiment/image021.jpg)

* Number of Training Iterations

1. Iterations: 100000
![Iterations: 100000](../Securing-Online-Transaction-using-Face-Recognition/experiment/image022.jpg)
![Iterations: 100000](../Securing-Online-Transaction-using-Face-Recognition/experiment/image023.jpg)

2. Iterations: 200000
![Iterations: 200000](../Securing-Online-Transaction-using-Face-Recognition/experiment/image024.jpg)
![Iterations: 200000](../Securing-Online-Transaction-using-Face-Recognition/experiment/image025.jpg)

3. Iterations: 300000
![Iterations: 300000](../Securing-Online-Transaction-using-Face-Recognition/experiment/image026.jpg)
![Iterations: 300000](../Securing-Online-Transaction-using-Face-Recognition/experiment/image027.jpg)

4. Iterations: 600000
![Iterations: 600000](../Securing-Online-Transaction-using-Face-Recognition/experiment/image028.jpg)
![Iterations: 600000](../Securing-Online-Transaction-using-Face-Recognition/experiment/image029.jpg)

5. Iterations: 800000
![Iterations: 800000](../Securing-Online-Transaction-using-Face-Recognition/experiment/image030.jpg)
![Iterations: 800000](../Securing-Online-Transaction-using-Face-Recognition/experiment/image031.jpg)


## Optimal Parameters

After conducting the above experiments with respect to varying training parameters such as Batch Size, Learning Rate and number of training iterations, the optimal values were found to be as follows:
* Batch Size: 1
When each iteration trains a single image, it was found that the featues of the image were learnt better.
* Learning Rate: 0.00001
With Learning Rate below 0.00001, it was found that the network was unable to detect objects at all. Learning Rate of 0.0001 detected objects, but with lesser accuracy in terms of classification. Hence, the optimal learning rate for good detection and classification is found to be 0.00001
* Number of training iterations: 800000
For training below 800000 iterations, the network was found to predict fewer bounding boxes with less accuracy. For training for iterations from 900000 to 1000000, the network was found to be over fit - i.e, performing well only on the training images. Hence, the optimal number of training iterations was concluded to be as 800000.

## Literature Survey

* Enhancing User Authentication of Online Credit Card Payment |
Authors: Gittipat Jetsiktat, Sasipa Panthuwadeethorn

* Credit Card Fraud Detection Based on Transaction Behavior |
Authors:  John Richard D. Kho, Larry A. Vea

* Fast and Efﬁcient Implementation of Convolutional Neural Networks |
Authors: Abhinav Podili, Chi Zhang, Viktor Prasanna

* Convolutional Neural Network Approach for Vision Based Student Recognition System |
Authors: Nusrat Mubin Ara, Md. Saiful Islam

* Facial Expression Recognition via Deep Learning |
Authors: Abir Fathalla, Gary Thung, Ali Doui
