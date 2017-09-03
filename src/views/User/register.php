<div class="container">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">Registrieren</div>
                <div class="panel-body">
                    <form method="POST" action="/user/register">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control input-sm" placeholder="Name">
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" class="form-control input-sm" placeholder="Email Addresse">
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" class="form-control input-sm" placeholder="Password">
                        </div>

                        <div class="form-group">
                            <input type="password" name="password2" class="form-control input-sm" placeholder="Confirm Password">
                        </div>

                        <button type="submit" class="btn btn-info btn-block">Registrieren</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>