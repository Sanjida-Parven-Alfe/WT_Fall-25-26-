document.addEventListener('DOMContentLoaded', function() {
    const supportForm = document.getElementById('ajaxSupportForm');
    
    if (supportForm) {
        supportForm.addEventListener('submit', function(e) {
            e.preventDefault(); 
            
            let formData = new FormData(this); 
            let responseBox = document.getElementById('responseMsg');

            
            fetch('../php/support_handler.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json()) 
            .then(data => {
                responseBox.style.display = 'block';
                responseBox.innerText = data.msg;
                
                if(data.status === 'success') {
                    responseBox.style.background = '#d4edda'; 
                    responseBox.style.color = '#155724';
                    document.getElementById('msg_body').value = ''; 
                } else {
                    responseBox.style.background = '#f8d7da'; 
                    responseBox.style.color = '#721c24';
                }
            })
            .catch(err => console.error('Error:', err));
        });
    }
});