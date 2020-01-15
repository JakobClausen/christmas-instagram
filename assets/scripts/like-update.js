function like_add(post_id) {
  $.post("/../../../app/users/like_get.php", { post_id: post_id }, function(
    data
  ) {
    $("#likes-value_" + post_id).text(data + " likes");
  });
}
