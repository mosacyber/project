<script>
    function updateTable(subjectCode) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("grades-table").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "update_table.php?subjectCode=" + subjectCode, true);
        xhttp.send();
    }
</script>
