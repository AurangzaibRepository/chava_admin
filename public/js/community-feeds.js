$(function(){

   populateFeeds();
});

function populateFeeds()
{
    $('#table-feeds').DataTable({
        'searching': false,
        'bLengthChange': false,
        'bSort': false,
        'serverSide': true,
        'columnDefs': [
            {'targets': 0, 'width':'8%', 'class': 'text-center'},
            {'targets': [2,3,4], 'width': '15%'},
            {'targets': 5, 'width': '10%'}
        ]
    });
}
