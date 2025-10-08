<div>
    <!-- The only way to do great work is to love what you do. - Steve Jobs -->
      <a {{$attributes}}
      href="/" aria-current="page" 
      href="/profil" aria-current="page" 
      href="/kontak" aria-current="page" 
      href="/student" aria-current="page"
      class="{{ $active ? "bg-gray-950/50 text-white" : "text-gray-300 hover:bg-white/5 hover:text-white" }} rounded-md  px-3 py-2 text-sm font-medium text-white">{{$slot}}
      
    </a>
</div>