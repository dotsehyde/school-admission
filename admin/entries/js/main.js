function deleteEntry(id) {
    let con = confirm("Do you want to delete this entry?");
    if (con) {
        window.location.href = `../entries/delete.php?id=${id}`;
    }
}

function viewDetail(id) {
    window.location.href = `../entries/details.php?id=${id}`;
}