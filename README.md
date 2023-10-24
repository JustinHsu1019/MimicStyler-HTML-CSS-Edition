# MimicStyler: HTML/CSS Edition
## Introduction:
MimicStyler is a tool designed for developers to practice and challenge their frontend skills. Players can choose a target image and attempt to replicate it using HTML and CSS. With real-time visual feedback and similarity comparison, players can continuously refine and perfect their code.

## Key Features:
1. Login Interface: Players enter their HCTI API key.
2. Image Upload: Players upload the image they wish to mimic.
3. Real-time Coding and Preview: Players can write HTML and CSS and see the results instantly.
4. Similarity Comparison: The system compares the similarity between the player's created image and the target image.
5. Logout feature.

## How to Use:
1. First, run start.bat.
2. Open a browser and enter 127.0.0.1:8000.
3. Navigate to the login interface and enter your HCTI API key.
4. Upload the target image you wish to mimic.
5. Write HTML and CSS on the coding page and click "Submit" to view the results.
6. Click "Compare" to see the similarity between your image and the target image.
7. If done, click "Logout".

## Technical Details:
1. Frontend Technology: Built with native HTML and CSS for a basic web interface.
2. Backend Technology: Designed with PHP for backend logic, especially in handling API requests and image generation.
3. Backend Technology: Uses PHP's curl function to call an external API (https://hcti.io/v1/image) to generate images from the player's HTML/CSS code.
4. Image Processing: Uses a JavaScript function to compare the similarity between two images, calculating pixel differences.

## Areas for Improvement:
1. Optimize API Key Input Process: Currently, entering the API Key through the login interface every time is cumbersome. We're looking for a more intuitive and convenient method.
2. RWD & Adaptive Screen Design: Ensure MimicStyler displays perfectly on all devices, offering players an enhanced user experience.
3. Refine Image Similarity Comparison Algorithm: Further improve the accuracy of image similarity comparison, helping players understand their mimicry results more precisely.
4. Develop In-house Image Generation Tool: Plan to develop a dedicated image generation tool for MimicStyler, eliminating reliance on the external HCTI API, ensuring more stable service quality.
5. Optimize Code Input Interface: Offer more shortcut options, like Shift + Alt + F for automatic code formatting, significantly boosting coding efficiency.

## References:
1. https://htmlcsstoimage.com/
2. https://codepen.io/rosewang0303/pen/mXrEwQ
3. https://cssbattle.dev/

## UI Interface:

![Snipaste_2023-09-28_18-12-03](https://github.com/JustinHsu1019/MimicStyler-HTML-CSS-Edition/assets/141555665/ce26cb61-9212-44a7-90ca-d90efb121bda)
![Snipaste_2023-09-28_18-13-42](https://github.com/JustinHsu1019/MimicStyler-HTML-CSS-Edition/assets/141555665/fa37dd04-cc64-4478-9efc-d311ebc2f0b4)
