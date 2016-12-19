$(function() {
    //
    // Default
    //
    $('a[data-bedard-socialite-default]').on('click', function(e) {
        e.preventDefault();
        var $link = $(this);
        $input = $link.closest('div').find('input');
        $input.val($link.data('default'));
    });

    //
    // Copy
    //
    $('a[data-bedard-socialite-copy]').on('click', function(e) {
        e.preventDefault();
        var $link = $(this);

        try {
            var $input = $link.closest('div').find('input');
            $input.select();
            document.execCommand('copy');
            $input.blur();
            $.oc.flashMsg({ text: $link.data('success'), class: 'success' });
        } catch (err) {
            $.oc.flashMsg({ text: $link.data('failed'), class: 'error' });
        }
    });
});
