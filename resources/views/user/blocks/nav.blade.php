<div id="categorymenu">
    <nav class="subnav">
        <ul class="nav-pills categorymenu">
            <li><a class="active"  href="{!! url('/') !!}">Home</a></li>
            
            <?php  
                $parentCates = DB::table('cates')
                                ->select('id', 'name', 'parent_id')
                                ->where('parent_id',0)
                                ->get();
            ?>
            @foreach($parentCates as $parentCate)
            <li><a href="{!! url('guest/category', $parentCate->id) !!}"><?php echo $parentCate->name; ?></a>
                <div>
                    <?php  
                        $childCates = DB::table('cates')
                                        ->select('id', 'name', 'parent_id')
                                        ->where('parent_id',$parentCate->id)
                                        ->get();
                    ?>
                    <ul>
                        @foreach($childCates as $childCate)
                        <li><a href="{!! url('guest/sub-category', $childCate->id) !!}">{{ $childCate->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </li>
            @endforeach
        </ul>
    </nav>
</div>