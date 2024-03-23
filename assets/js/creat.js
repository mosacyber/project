/////////// التحقق من الرقم الجامعي أو الوظيفي ///////////

document.getElementById('accountID').addEventListener('input', function() {
    var accountIDElement = document.getElementById('accountID');
    var accountIDValue = this.value.trim();

    if (accountIDValue !== '' && !isNaN(accountIDValue)) {
        if (accountIDValue.length === 9) {
            document.getElementById('accountIDValidationMessage-accountID').innerHTML = '<div style="color: green;">تم التحقق بنجاح!</div>';
            accountIDElement.style.border = '1px solid green';
            accountIDElement.style.backgroundColor = '#fff';
        } else if (accountIDValue.length < 9) {
            document.getElementById('accountIDValidationMessage-accountID').innerHTML = '<div style="color: red;">الرجاء إكمال رقم الجامعي حتى 9 أرقام.</div>';
            accountIDElement.style.border = '1px solid maroon';
            accountIDElement.style.backgroundColor = '#fff';
        } else {
            document.getElementById('accountIDValidationMessage-accountID').innerHTML = '<div style="color: red;">رقم الجامعي يجب أن يكون 9 أرقام.</div>';
            accountIDElement.style.border = '1px solid maroon';
            accountIDElement.style.backgroundColor = '#fff';
        }
    } else {
        document.getElementById('accountIDValidationMessage-accountID').innerHTML = '<div style="color: red;">الرجاء إدخال رقم جامعي صحيح.</div>';
        accountIDElement.style.border = '1px solid maroon';
        accountIDElement.style.backgroundColor = '#fff';
    }
});

// إضافة حدث click على الزر الآخر
document.getElementById('accountID').addEventListener('click', function() {
    var accountIDElement = document.getElementById('accountID');
    var currentBorderStyle = accountIDElement.style.border;
    var bodyBackgroundColor = getComputedStyle(document.body).getPropertyValue('--app-container').trim();

    if (bodyBackgroundColor === '#f3f6fd') {
        if (currentBorderStyle === '1px solid maroon' || currentBorderStyle === '1px solid green') {
            accountIDElement.style.border = '1px solid ' + currentBorderStyle.split(' ')[2];
            accountIDElement.style.backgroundColor = '#fff';
        } else {
            accountIDElement.style.border = '1px solid #aeaeae';
            accountIDElement.style.backgroundColor = '#fff';
        }
    } else {
        if (currentBorderStyle === '1px solid maroon') {
            accountIDElement.style.backgroundColor = 'maroon';
        } else if (currentBorderStyle === '1px solid green') {
            accountIDElement.style.backgroundColor = 'green';
        } else {
            accountIDElement.style.backgroundColor = '#aeaeae';
        }
    }
});

// إضافة حدث click على الزر الآخر
document.getElementById('FName').addEventListener('click', function() {
    document.getElementById('accountIDValidationMessage-accountID').style.display = 'none';
   
    var accountIDElement = document.getElementById('accountID');
    if (accountIDElement && accountIDElement.style.border === '1px solid green') {
        document.querySelector('.submit-btn').removeAttribute('disabled');
        console.log('Entering click event handler');
// الكود الحالي
console.log('Exiting click event handler');

    }

});
///////////////////////// النهاية ///////////////////////



