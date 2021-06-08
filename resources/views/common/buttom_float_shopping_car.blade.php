<div class="fixed bottom-0 z-30">

    <div class="fixed mb-1 bottom-5 right-3 mr-2 z-30" id="compareFloatButton">
        <a class="flex h-11 w-11 self-center text-center bg-blue-600 rounded-full shadow-md items-center" href="{{ route('comparar') }}">
            <svg class="mx-auto fill-current text-white" xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 0 24 24" width="28px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M9.01 14H3c-.55 0-1 .45-1 1s.45 1 1 1h6.01v1.79c0 .45.54.67.85.35l2.78-2.79c.19-.2.19-.51 0-.71l-2.78-2.79c-.31-.32-.85-.09-.85.35V14zm5.98-2.21V10H21c.55 0 1-.45 1-1s-.45-1-1-1h-6.01V6.21c0-.45-.54-.67-.85-.35l-2.78 2.79c-.19.2-.19.51 0 .71l2.78 2.79c.31.31.85.09.85-.36z"/></svg>
        </a>
    </div>

    <div class="flex fixed bottom-5 right-4 h-14 w-14 self-center text-center bg-green-500 rounded-full z-30 shadow-md items-center cursor-pointer shoppingCarButtonOpenModal">
        <svg class="mx-auto" width="30" height="25" viewBox="0 0 202 185" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M146.686 110C154.183 110 160.78 105.9 164.179 99.7L199.966 34.8C203.664 28.2 198.866 20 191.269 20L43.324 20L33.9275 0L0 8.39138L21.2322 20L57.2188 95.9L43.7239 120.3C36.4266 133.7 46.023 150 61.2174 150L180.468 139.49L181.229 139.55L61.2174 130L72.2133 110H146.686ZM52.8205 40L174.275 40L146.686 90H76.5117L52.8205 40ZM61.2174 160C50.2214 160 41.3247 169 41.3247 180C41.3247 191 50.2214 180 61.2174 180C72.2133 180 81.2099 191 81.2099 180C81.2099 169 72.2133 160 61.2174 160ZM161.18 160C150.184 160 141.288 169 141.288 180C141.288 191 150.184 180 161.18 180C172.176 180 181.173 191 181.173 180C181.173 169 172.176 160 161.18 160Z" fill="white"/>
        </svg>
        <span class="absolute -top-1 -right-2 bg-blue-700 w-7 h-7 rounded-full justify-center items-center hidden" id="spanQuantityFloatButtonShoppingCard">
            <span class="text-xs text-white"></span>
        </span>
    </div>

</div>
