
<script src="./assets/admin/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="./assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="./assets/admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="./assets/admin/dist/js/sb-admin-2.js"></script>
<script src="./assets/admin/ajaxLoadIMG.js"></script>

<!-- DataTables JavaScript -->
<script src="./assets/admin/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
<script src="./assets/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script type="text/javascript">
    function hienthianh() {
        var fileSelected=document.getElementById('upload').files;
        console.log('fileSelected');
        if (fileSelected.length>0){
            var fileToLoad = fileSelected[0];
            var fileReader = new FileReader();
            fileReader.onload = function (fileLoaderEvent) {
                var srcData = fileLoaderEvent.target.result;
                var newImage= document.createElement('img');
                newImage.src=srcData;
                document.getElementById('displayImg').innerHTML=newImage.outerHTML;
            }
            fileReader.readAsDataURL(fileToLoad);
        }
        document.getElementById('anhcu').style.display = "none";
    }
    CKEDITOR.replace( 'editor1' );
</script>
</body>

</html>
