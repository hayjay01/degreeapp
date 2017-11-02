<div class="col-md-3">
        <div class="panel panel-success">
            <div class="panel-heading">
                Welcome, @if(strtolower(auth()->user()->gender) == "male") Mr. @else Mrs. @endif {{ Auth::user()->name }}
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('dashboard') }}">Home</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('department.all') }}">All Department</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('department.create') }}">Add Department</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('session.all') }}">All Session</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('session.create') }}">Add Sessions</a>
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
       {{--  <div class="panel-body">
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('department.all') }}">All Department</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('department.create') }}">Add Department</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('session.all') }}">All Session</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('session.create') }}">Add Sessions</a>
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
                    <a href="{{ route('verify.student.payment') }}">Verify Payments</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('logout') }}">Logout</a>
                </li>
            </ul>
        </div> --}}
        {{-- <div class="panel-footer text-center">Developed by <a href="#">Buildit.com.ng</a></div> --}}
</div>
{{-- </div> --}}