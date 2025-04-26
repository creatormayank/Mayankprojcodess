function toggleDrawer() {
    const drawer = document.getElementById('drawer');
    if (drawer.style.display === 'block') {
        drawer.style.display = 'none';
    } else {
        drawer.style.display = 'block';
    }
}

// for otp handel
function toggleDrawer() {
    const drawer = document.getElementById('drawer');
    if (drawer.style.display === 'block') {
        drawer.style.display = 'none';
    } else {
        drawer.style.display = 'block';
    }
}

function generateOTP() {
    // For simplicity, we're simulating OTP generation.
    alert("OTP has been sent to your mobile number.");
    document.getElementById('otpBox').style.display = 'block';
}
