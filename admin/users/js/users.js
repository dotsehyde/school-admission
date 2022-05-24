
function deleteUser(id) {
    let con = confirm("Do you want to delete this user?");
    if (con) {
        try {
            fetch(`http://localhost/admission/admin/users/deleteUser.php?id=${id}`, { method: 'get' })
                .then(res => {
                    if (res.status == 200) {
                        location.reload();
                        alert("User deleted successfully");
                    } else {
                        alert("Failed to delete user");
                    }
                });
        } catch (err) {
            console.error(err);
        }
    }

}