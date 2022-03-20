preview = (source, where) => {
    document.querySelector(where).src = URL.createObjectURL(source.files[0]);       
}

$('input[set=preview]').change( (e) => {
    target = e.currentTarget.getAttribute('to');
    preview (e.currentTarget, target);
});