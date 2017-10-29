<div class="col-md-4">
        <div class="panel panel-success">
            <div class="panel-heading">
                Welcome {{ Auth::user()->name }}
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('dashboard') }}">Home</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('student.all') }}">All Students</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('director.student') }}">Upload Students (Single)</a>
                    </li>
                    <li class="list-group-item">
                        <a href="">Upload Students (Batch)</a>
                    </li>
                    <li class="list-group-item">
                        <a href="">Verify Payments</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="panel-footer text-center">Developed by <a href="#">Buildit.com.ng</a></div>
        </div>
    </div>