import torch
import torchvision.transforms as transforms
from torchvision.datasets import CIFAR10
from torch.utils.data import DataLoader
import torch.nn.functional as F
#from ml_complex_cnn_CIFAR_10_hyperparameter_best-part2-dropout_regularization_tuned_batch_norm import Net
from ml_complex_cnn_CIFAR_10_hyperparameter_best_part2_dropout_regularization_tuned_batch_norm import Net


# Define the transformations for the dataset
transform_test = transforms.Compose([
    transforms.ToTensor(),
    transforms.Normalize((0.5, 0.5, 0.5), (0.5, 0.5, 0.5))
])

# Load the CIFAR-10 test dataset
testset = CIFAR10(root='~/workspace/sandbox/data', train=False, download=True, transform=transform_test)
testloader = DataLoader(testset, batch_size=128, shuffle=False, num_workers=2)

# Load the saved model
model = Net()
model.load_state_dict(torch.load('ml_complex_cnn_CIFAR_10_trained_model-batch-norm.pth'))
model.eval()  # Set the model to evaluation mode

device = torch.device("cuda:0" if torch.cuda.is_available() else "cpu")
model.to(device)

# Define a function for inference
def predict(model, dataloader):
    model.eval()  # Set the model to evaluation mode
    predictions = []
    with torch.no_grad():
        for images, _ in dataloader:
            images = images.to(device)
            outputs = model(images)
            _, predicted = torch.max(outputs, 1)
            predictions.extend(predicted.cpu().numpy())
    return predictions

# Perform inference
predictions = predict(model, testloader)

# Display the predictions
print(predictions)

