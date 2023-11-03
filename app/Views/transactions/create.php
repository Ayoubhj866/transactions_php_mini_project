<div class="row">

    <div class="col-sm-12 col-lg-6 card">
        <div class="card-header">
            Create multible transactions from <strong>csv file</strong>
        </div>
        <div class="card-body">
            <!-- CREATE MULTIBLE TRANSACTIONS FROM CSV FIL  -->
            <form action="/transactions/create" method="POST" enctype="multipart/form-data">
                <input class="form-control" type="file" name="csv_transactions" id="formFile" accept=".csv">
                <button type="submit" class="btn btn-primary mt-2 m-right">Save</button>
            </form>
        </div>
    </div>

    <div class="col-sm-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                Create new transaction
            </div>
            <div class="card-body">

                <!-- CREAT NEW TRANSACTION FROM FORM-->
                <form method="POST" action="/transactions/create">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Date</span>
                        <input type="date" class="form-control" name="date">
                    </div>

                    <div class=" input-group mb-3">
                        <span class="input-group-text">Check</span>
                        <input required type="text" class="form-control" name="check">
                    </div>

                    <div class=" input-group mb-3">
                        <span class="input-group-text">$</span>
                        <input required type="text" class="form-control" name="amount" aria-label="Amount (to the nearest dollar)">
                        <span class="input-group-text">.00</span>
                    </div>


                    <div class=" input-group mb-3">
                        <span class="input-group-text">Description</span>
                        <input required type="text" class="form-control" name="description">
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>

            </div>
        </div>
    </div>
</div>