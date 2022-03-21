var table;
var i = 1;

$(function(){

   populateFeeds();
});

// Bind datatable page click
$(document).bind('click', 'div.pagination li', function(evt){
    i = ((table.page.info().page + 1) * 10) - 9;
});

function populateFeeds()
{
    table = $('#table-feeds').DataTable({
        'searching': false,
        'bLengthChange': false,
        'bSort': false,
        'serverSide': true,
        'columnDefs': [
            {'targets': 0, 'width':'8%', 'class': 'text-center',
                'render': function() {
                    return i++;
                }},
            {'targets': 1, 'data': 'question'},
            {'targets': 2, 'data': 'user_name'},
            {'targets': 3, 'data': 'createdAt', 
                'render': function(data){
                    let date = new Date(data);
                    return date.toLocaleDateString('en-GB');
                }
            },
            {'targets': 4, 'data': 'status'},
            {'targets': [2,3,4], 'width': '15%'},
            {'targets': 5, 'width': '10%',
                'render': function(data){
                    return `
                    <a><i class="fa fa-check icon-primary"></i></a>
                    <a href=""><i class="fa fa-times icon-secondary"></i></a>
                    `
                }}
        ],
        'ajax': {
            type: 'POST',
            url: '/community/listing'
        }
    });
}
