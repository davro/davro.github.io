import torch
import torchvision.transforms as transforms
from PIL import Image
import matplotlib.pyplot as plt
#from model_file import Net  # Assuming Net is the class defining your CNN model
from ml_complex_cnn_CIFAR_10_hyperparameter_best import Net  # Assuming Net is the class defining your CNN model

# Define transformations for the input image
transform = transforms.Compose([
    transforms.Resize((32, 32)),  # Resize to match input size of the model
    transforms.ToTensor(),
    transforms.Normalize((0.5, 0.5, 0.5), (0.5, 0.5, 0.5))  # Normalize as during training
])

# Load the pre-trained model
model_path = 'ml_complex_cnn_CIFAR_10_trained_model.pth'
model = Net()
model.load_state_dict(torch.load(model_path))
model.eval()

# Load and preprocess the image
image_path = 'test-airplane-birds.jpg'
image = Image.open(image_path)
image_tensor = transform(image).unsqueeze(0)  # Add batch dimension

# Perform a forward pass
with torch.no_grad():
    output = model(image_tensor)

# Post-processing (e.g., object detection)
# Apply appropriate post-processing steps based on your model's output format

# Visualize or output the results
# Visualize the image with bounding boxes or output the results in a structured format

