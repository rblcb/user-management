$(document).ready(function(){
    $('.delete-form').on('submit', function(){
        return confirm('Are you sure?');
    });
});