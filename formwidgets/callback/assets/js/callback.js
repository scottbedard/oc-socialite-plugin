$(function() {
    $('a[data-bedard-socialite-copy]').on('click', function(e) {
        e.preventDefault();
        var $copy = $(this);

        try {
            var $input = $copy.closest('div').find('input');
            $input.select();
            document.execCommand('copy');
            $input.blur();
            $.oc.flashMsg({ text: $copy.data('success'), class: 'success' });
        } catch (err) {
            $.oc.flashMsg({ text: $copy.data('failed'), class: 'error' });
        }
    });
});
