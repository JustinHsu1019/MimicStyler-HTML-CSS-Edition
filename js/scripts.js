$('table').height(document.body.clientHeight * 0.85);
$('table').width(document.body.clientHeight * 1.25);
function delCookie() {
  document.cookie = "username=; expires=Thu, 01 Jan 1970 00:00:00 GMT";
  document.cookie = "password=; expires=Thu, 01 Jan 1970 00:00:00 GMT";
  location.reload();
}
function compareImages(img1, img2, callback) {
  let canvas = document.createElement('canvas');
  let ctx = canvas.getContext('2d');

  canvas.width = img1.width;
  canvas.height = img1.height;

  ctx.drawImage(img1, 0, 0);
  let data1 = ctx.getImageData(0, 0, img1.width, img1.height).data;

  ctx.clearRect(0, 0, canvas.width, canvas.height);

  ctx.drawImage(img2, 0, 0);
  let data2 = ctx.getImageData(0, 0, img2.width, img2.height).data;

  let diff = 0;
  for (let i = 0; i < data1.length; i += 4) {
    let pixelDiff = Math.abs(data1[i] - data2[i]) +
      Math.abs(data1[i + 1] - data2[i + 1]) +
      Math.abs(data1[i + 2] - data2[i + 2]) +
      Math.abs(data1[i + 3] - data2[i + 3]);

    pixelDiff /= 4.0;

    diff += pixelDiff;
  }

  let maxDiff = 255 * (img1.width * img1.height);
  let similarity = (1 - (diff / maxDiff)) * 100;
  callback(similarity);
}
document.getElementById('compare-button').addEventListener('click', function () {
  let img1 = document.getElementById('imgp');
  let img2 = document.getElementById('imgp2');

  compareImages(img1, img2, function (similarity) {
    alert('兩張圖片的相似度為: ' + similarity.toFixed(2) + '%');
  });
});
