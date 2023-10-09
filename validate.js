const sendButton = document.getElementById("submit_request")
sendButton.onclick = validate;
function validate() {
    const xVal = document.forms['form']['x'].value.replace(/,/, '.');
    const yVal = document.forms['form']['y'].value.replace(/,/, '.');
    const rVal = document.forms['form']['r'].value.replace(/,/, '.');
    console.log('form values: ' + xVal + ' ' + yVal + ' ' + rVal);
    if (isEmpty(xVal)) {
        xTable = document.getElementsByClassName('x-table');
        for (let i = 0; i < xTable.length; ++i) {
            xTable.item(i).style.background = 'red';
        }
        alert('Select X');
    } else if (isEmpty(yVal)) {
        document.getElementsByClassName('text-input')[1].style.background = 'red';
        alert('Enter a number in Y field');
    } else if (isEmpty(rVal)) {
        document.getElementsByClassName('text-input')[1].style.background = 'red';
        alert('Enter a number in R field');
    } else {
        if (isNaN(xVal) || (Math.abs(xVal) > 4)) {
            for (let i = 0; i < xTable.length; ++i) {
                xTable.item(i).style.background = 'red';
            }
            alert('X must be integer number in range [-4; 4]');
        } else if (isNaN(yVal) || yVal <= -3 || yVal >= 5) {
            document.getElementsByClassName('text-input')[1].style.background = 'red';
            alert('Y must be number in range (-3; 5)');
        } else if (isNaN(rVal) || rVal <= 2 || rVal >= 5) {
            document.getElementsByClassName('text-input')[1].style.background = 'red';
            alert('R must be number in range (2; 5)');
        }
         else send(document.forms['form']['x'], document.forms['form']['y'], document.forms['form']['r']);

    }
    const table = document.getElementById("table");
    function send(x, y, r) {
        $.ajax({
            url: 'php/check.php',
            method: 'POST',
            data: {x, y, r},
            success: function (data) {
                console.log(data)
                const tbody = table.querySelector('tbody');
                tbody.innerHTML += data;
            },
            error: function () {
                alert('Smth went wrong');
            }
        });
    }

    function isEmpty(obj) {
        for (let key in obj) {
            return false;
        }
        return true;
    }
}