<div class="col-md-4 mt-5 pt-4 pr-0">
    <div class="card" style="background: #7c0921; color: white; position: -webkit-sticky; position: sticky; top: 60px;">
        <div class="card-header">
            <h3 class="card-title">Who to follow</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0" style="background-color: white;">
            <ul class="products-list product-list-in-card pl-3 pr-2">
                @if(isset($user) && count($user) > 0)
                    @foreach ($user as $users)
                        @if($users->profile)
                            <li class="item">
                                <div class="product-img">
                                    @if(method_exists($users->profile, 'getAvatar'))
                                        <img class="img-circle img-size-50" src="{{ $users->profile->getAvatar() }}" alt="User Image">
                                    @else
                                        <img class="img-circle img-size-50" src="default-avatar.png" alt="Default Avatar">
                                    @endif
                                </div>
                                <div class="product-info">
                                    @if(isset($users->profile->nama_lengkap))
                                        <a href="#" class="product-title text-dark">{{ $users->profile->nama_lengkap }}</a>
                                    @endif
                                    <?php $is_following = App\Models\Follower::where('follow_id', '=', $users->id)->where('user_id', Auth::id())->first(); ?>
                                    @if (is_null($is_following))
                                        <a class="btn btn-light btn-sm float-right mt-2 mr-3 py-2" href="/following/{{ $users->id }}" style="border-radius:50px">Follow</a>
                                    @else
                                        <a class="btn btn-light btn-sm float-right mt-2 mr-3 py-2" href="/unfollow/{{ $users->id }}" style="border-radius:50px">Following</a>
                                    @endif
                                    <p>@ {{ $users->name }}</p>
                                </div>
                            </li>
                        @endif
                    @endforeach
                @else
                    <li class="item">
                        <div class="product-info">
                            <p class="text-center">No users to follow</p>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
