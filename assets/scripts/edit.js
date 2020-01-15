const postContainers = document.querySelectorAll(".post-container");

window.addEventListener("scroll", function(ev) {
  postContainers.forEach(postContainer => {
    const distanceToTop = postContainer.getBoundingClientRect().top;
    if (distanceToTop <= 1000 && distanceToTop >= -200) {
      console.log(postContainer.id);

      document.getElementById("input-edit").value = postContainer.id;
    }
  });
});
