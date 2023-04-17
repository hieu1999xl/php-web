$(document).ready(function () {
    const detailCaseStudy = $('.detailCaseStudy');
    detailCaseStudy.click(function (e) {
        e.preventDefault();
        let url = $(this).attr('href');
        $.ajax({
            url: '/case-studies/destroySession',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            dataType: 'json',
            success: function(result) {
                if (result) {
                    window.location.href = url;
                } else {
                    console.log('errors');
                }
            },
        })
    })
})
