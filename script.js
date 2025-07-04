document.querySelector('input[name="profile_picture"]').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        // Check file size
        if (file.size > 2000000) {
            alert('File too large. Maximum size is 2MB.');
            e.target.value = '';
        }
        
        // Check file type
        const validTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!validTypes.includes(file.type)) {
            alert('Only JPG, PNG, and GIF files are allowed.');
            e.target.value = '';
        }
    }
});