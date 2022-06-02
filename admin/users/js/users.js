
function deleteUser(id) {
    let con = confirm("Do you want to delete this user?");
    if (con) {
        window.location.href = `../users/delete.php?id=${id}`;
    }

}