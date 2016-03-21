<div class="panel panel-primary">

    <div class="panel-heading">
        <div class="panel-title">SearchFile Application</div>
    </div>

    <div class="panel-body">

        <form id="dataInputForm" method="post" action="">
            <div class="form-group">
                <label for="fileName">File name</label>
                <input type="text" class="form-control" id="fileName" name = "fileName" value="robots.txt">
            </div>
            <div class="form-group">
                <label for="URL">Site URL</label>
                <div class="input-group">
                    <span class="input-group-addon">http://</span>
                    <input type="text" class="form-control" id="URL" name="URL" placeholder="Enter website address">
                </div>
            </div>
            <button type="submit" name="submit" id="check" class="btn btn-success">Submit</button>
        </form>

    </div>