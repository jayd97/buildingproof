// Function to immediately invoke to handle the enabling or disabling of the "Sign Up" button
(function () {
    const checkboxPrivacy = document.getElementById('agreePrivacyPolicy');
    const checkboxTerms = document.getElementById('agreeTermsOfUse');
    const signUpButton = document.getElementById('SignUp_Submit');

    // Function to update the "Sign Up" button's disabled status
    function updateSignUpButtonStatus() {
        // The "Sign Up" button is enabled only if both checkboxes are checked
        signUpButton.disabled = !(checkboxPrivacy.checked && checkboxTerms.checked);
    }

    // Initialize "Sign Up" button status on page load
    updateSignUpButtonStatus();

    // Attach change event listeners to checkboxes to update the button status dynamically
    checkboxPrivacy.addEventListener('change', updateSignUpButtonStatus);
    checkboxTerms.addEventListener('change', updateSignUpButtonStatus);
})();
