document.addEventListener('DOMContentLoaded', function() {
    
    const formulaire = document.querySelector('form');
    
    formulaire.addEventListener('submit', function(event) {
        
        const nom = document.querySelector('input[name="nom"]').value.trim();
        const prenom = document.querySelector('input[name="prenom"]').value.trim();
        const filiere = document.querySelector('select[name="fil"]').value;
        
        let messageErreur = '';
        
        if (nom === '') {
            messageErreur += 'Le nom est obligatoire.\n';
        }
        
        if (prenom === '') {
            messageErreur += 'Le prénom est obligatoire.\n';
        }
        
        if (filiere === '' || filiere === null) {
            messageErreur += 'Veuillez sélectionner une filière.\n';
        }
        
        if (messageErreur !== '') {
            event.preventDefault();
            alert(messageErreur);
        }
    });
});