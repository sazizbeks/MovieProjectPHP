$('form').hide();
$(document).ready(function () {
    $('#addMovie').on('click',function () {
        $('#addMovieBlock').slideToggle();
    });

    $('#deleteMovie').on('click',function () {
        $('#deleteMovieBlock').slideToggle();
    });

    $('#addActor').on('click',function () {
        $('#addActorBlock').slideToggle();
    });

    $('#addMovieGenres').on('click',function () {
        $('#addMovieGenresBlock').slideToggle();
    });
});
