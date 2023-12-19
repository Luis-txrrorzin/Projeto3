function onSignIn(googleUser) {
    // Obtenha as informações do usuário do Google
    var profile = googleUser.getBasicProfile();
    
    // Exemplo: exiba o nome e o e-mail do usuário
    console.log('Nome: ' + profile.getName());
    console.log('E-mail: ' + profile.getEmail());
  }