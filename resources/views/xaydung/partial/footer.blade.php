<footer class="footer">
    <div class="container"><span class="footerLogo"></span>
        <div class="footer_copyright">
            @if(!empty($systemInfo->info) || isset($systemInfo->info))
                {!! $systemInfo->info!!}
                @else
                <p>Công ty TNHH XDTH Thiên Bình</p>
                <p>Copyright ©2018 by <a href="#">Công ty TNHH XDTH Thiên Bình</a>. All rights reserved.</p>
            @endif
        </div>
    </div>
</footer>

