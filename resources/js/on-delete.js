const CSRF = document.querySelector('meta[name="csrf-token"]').content;

const headers = {
    'Content-Type': 'application/json',
    'X-CSRF-TOKEN': CSRF
};

const data = {
    'method': 'DELETE',
    'headers': headers,
};
async function onDelete (id) {
    const url = `admin/user/${id}`;
    await fetch(url, data)
    .then(response => response.json())
    .then(result => console.log(result));
};

// Swal.fire({
//     title: 'Are you sure?',
//     text: "You won't be able to revert this!",
//     icon: 'warning',
//     showCancelButton: true,
//     confirmButtonColor: '#3085d6',
//     cancelButtonColor: '#d33',
//     confirmButtonText: 'Yes, delete it!'
//     }).then((result) => {
//     if (result.isConfirmed) {
//         Swal.fire(
//         'Deleted!',
//         'Your file has been deleted.',
//         'success'
//         )
//     }
// });
