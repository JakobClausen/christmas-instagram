const imgContainers = document.querySelectorAll(".img-container");
const images = document.querySelectorAll(".img");

imgContainers.forEach(imgContainer => {
  console.log(imgContainer.clientHeight);

  images.forEach(image => {
    console.log(image.clientHeight);

    // imgContainer.clientHeight = image.clientHeight;
  });
});
