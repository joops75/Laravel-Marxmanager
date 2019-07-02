import axios from 'axios';

$('body').on('click', '.delete-bookmark', function() {
    const id = $(this).data('id');

    axios.delete('/bookmarks/' + id)
        .then(() => {
            window.location.reload();
        })
        .catch(err => {
            console.log(err);
        });
});