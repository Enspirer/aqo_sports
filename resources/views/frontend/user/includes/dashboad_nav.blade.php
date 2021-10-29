<div class="side-nav">
    <div class="container">
        <div class="row">
            <div class="col col-md-12">
                <img src="{{ $logged_in_user->picture }}" alt="Avatar" class="md-avatar rounded-circle">
                <h3>{{auth()->user()->first_name}} {{auth()->user()->last_name}}</h3>
                <a href=""><i><svg xmlns="http://www.w3.org/2000/svg" width="3" height="13" viewBox="0 0 3 13">
                            <g id="Group_111" data-name="Group 111" transform="translate(-335 -293)">
                                <circle id="Ellipse_20" data-name="Ellipse 20" cx="1.5" cy="1.5" r="1.5" transform="translate(335 293)" fill="#333"></circle>
                                <circle id="Ellipse_21" data-name="Ellipse 21" cx="1.5" cy="1.5" r="1.5" transform="translate(335 298)" fill="#333"></circle>
                                <circle id="Ellipse_22" data-name="Ellipse 22" cx="1.5" cy="1.5" r="1.5" transform="translate(335 303)" fill="#333"></circle>
                            </g>
                        </svg>
                    </i></a>
            </div>
        </div>
    </div>

    <div class="buttons-section">
        <a href="{{route('frontend.user.dashboard')}}" class="btn" style="{{ Request::segment(1) === 'dashboard' ? 'background:#fabf02' : null }}">
            <i><img src="{{url('aqo_se/assets/image/dashboard.png')}}" width="22" height="22" viewBox="0 0 18.348 25.062" />
           </i> Dashboard</a>
        <a href="{{route('frontend.user.my_competition')}}" class="btn" style="{{ Request::segment(1) === 'my_competition' ? 'background:#fabf02' : null }}">
            <i><svg xmlns="http://www.w3.org/2000/svg" width="18.348" height="25.062" viewBox="0 0 18.348 25.062">
                    <g id="Group_108" data-name="Group 108" transform="translate(-720.369 -1624.857)">
                        <path id="Path_133" data-name="Path 133" d="M779.836,1628.772a7.7,7.7,0,0,0,3.589-.868c.86-.418,1.7-.884,2.539-1.34a15.829,15.829,0,0,1,3.2-1.421,7.234,7.234,0,0,1,2.4-.276.918.918,0,0,1,.974.779q1.217,4.479,2.43,8.96c.114.422-.086.7-.511.66a7.423,7.423,0,0,0-3.867.782c-1.064.51-2.094,1.09-3.137,1.645a13.1,13.1,0,0,1-3.147,1.292,6.919,6.919,0,0,1-2,.182,1.007,1.007,0,0,1-1.029-.831q-.843-3.1-1.684-6.207-.363-1.34-.724-2.682c-.123-.457.07-.7.543-.676C779.55,1628.778,779.693,1628.772,779.836,1628.772ZM789.9,1631.9l-.708-2.61a1.291,1.291,0,0,0-.123.047c-.753.4-1.5.792-2.258,1.185-.1.052-.1.114-.077.211.216.784.428,1.568.642,2.353.012.045.032.087.043.118Zm-5.315,2.816-.709-2.611c-.453.129-.878.272-1.313.369s-.892.149-1.357.223l.7,2.6A7.281,7.281,0,0,0,784.583,1634.718Zm.868,2.494,2.466-1.324-.635-2.338-2.468,1.317Zm-1.45-5.347c.82-.451,1.61-.883,2.4-1.322a.19.19,0,0,0,.045-.166c-.07-.29-.153-.576-.232-.864l-.356-1.31-.194.108-1.819.986c-.152.082-.381.126-.436.249s.057.328.1.5C783.664,1630.627,783.825,1631.213,784,1631.864Zm9.3,1.991c-.208-.766-.406-1.5-.614-2.237a.193.193,0,0,0-.158-.092,6.329,6.329,0,0,0-.85.1c-.513.11-1.019.25-1.543.38l.647,2.38A8.539,8.539,0,0,1,793.3,1633.856Zm-2.077-7.659a7.929,7.929,0,0,0-2.535.531l.625,2.3a8.632,8.632,0,0,1,2.535-.528Z" transform="translate(-56.277)" fill="#4f4f4f"></path>
                        <path id="Path_134" data-name="Path 134" d="M721.222,1721.046a.923.923,0,0,1,.846.747q.468,1.843.935,3.687,2.013,7.934,4.027,15.867a.885.885,0,0,1-.231.941.816.816,0,0,1-.851.18.852.852,0,0,1-.576-.655q-.45-1.78-.9-3.56-2.028-8-4.056-15.994a.868.868,0,0,1,.358-1.058A2.6,2.6,0,0,1,721.222,1721.046Z" transform="translate(0 -92.598)" fill="#4f4f4f"></path>
                    </g>
                </svg>
            </i> My Competitions</a>
        <a href="{{route('frontend.user.details_pending')}}" class="btn" style="{{ Request::segment(1) === 'pending_competition' ? 'background:#fabf02' : null }}">
            <i><svg xmlns="http://www.w3.org/2000/svg" width="17.235" height="25.062" viewBox="0 0 17.235 25.062">
                    <g id="Group_109" data-name="Group 109" transform="translate(-2883.674 -1668.461)">
                        <path id="Path_135" data-name="Path 135" d="M2891.225,1686.012c-.492-1.282-1.264-1.94-2.729-1.389-1.246.469-2.064.1-1.967-1.37a1.955,1.955,0,0,0-1.661-2.231c-1.292-.356-1.55-1.109-.7-2.156a1.975,1.975,0,0,0,.061-2.791c-.9-1.089-.691-1.884.7-2.262a1.959,1.959,0,0,0,1.612-2.27c-.085-1.359.659-1.81,1.855-1.347a2.059,2.059,0,0,0,2.755-.958c.7-1.04,1.512-1.027,2.2,0a2.05,2.05,0,0,0,2.75.957c1.185-.456,1.937-.027,1.844,1.351a1.941,1.941,0,0,0,1.612,2.267c1.267.326,1.64,1.063.794,2.141a2.1,2.1,0,0,0-.012,2.931c.832,1.052.546,1.824-.743,2.156a2.045,2.045,0,0,0-1.662,2.4c.067,1.205-.6,1.639-1.665,1.237a2.174,2.174,0,0,0-2.994,1.046c-.575.98-1.335.677-2.094.247Zm.962-2.139a6.453,6.453,0,1,0-6.4-6.583A6.4,6.4,0,0,0,2892.187,1683.872Z" transform="translate(0 0)" fill="#4f4f4f"></path>
                        <path id="Path_136" data-name="Path 136" d="M2922.762,1728.938c-.416-.3-.827-.606-1.25-.893-.377-.255-.771-.487-1.3-.819l-1.325,2.815c-1.021-2.423-2.022-4.692-2.924-7-.3-.774.669-1.58,1.637-1.461.887.11,1.774.228,2.981.383.782,2.086,1.663,4.431,2.543,6.777Z" transform="translate(-22.215 -36.601)" fill="#4f4f4f"></path>
                        <path id="Path_137" data-name="Path 137" d="M2891.713,1722.8l-2.97,7.556-1.333-2.873-2.611,1.626-.348-.137c.842-2.153,1.636-4.326,2.553-6.446.3-.7,3.293-.829,3.923-.287.258.222.552.4.832.6Z" transform="translate(-0.535 -36.832)" fill="#4f4f4f"></path>
                        <path id="Path_138" data-name="Path 138" d="M2898.583,1678.837a5.739,5.739,0,1,1-5.8,5.638A5.725,5.725,0,0,1,2898.583,1678.837Zm1.206,2.166a15.139,15.139,0,0,0-1.834.023.906.906,0,0,0-.6.491c-.065.16.129.617.238.627,1.191.113.774,1.016.8,1.64.053,1.127-.024,2.261.05,3.387.02.3.4.572.607.857.247-.249.7-.492.708-.748C2899.815,1685.24,2899.789,1683.2,2899.789,1681Z" transform="translate(-6.276 -7.151)" fill="#4f4f4f"></path>
                    </g>
                </svg>
            </i> Pending Competition</a>

        <a href="{{route('frontend.user.my_team')}}" style="{{ Request::segment(1) === 'my_team' ? 'background:#fabf02' : null }}" class="btn"><i class="fa fa-users"></i> My Teams</a>

        
        @if(is_judge(auth()->user()->id) == null)
            @if(is_judge_requested(auth()->user()->id))
                <button data-toggle="modal" data-target="#exampleModal" class="btn" style="{{ Request::segment(1) === 'my_judgement' ? 'background:#fabf02' : null }}">
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="23.656" height="22.388" viewBox="0 0 23.656 22.388">
                            <g id="Group_137" data-name="Group 137" transform="translate(-1837.408 -896.663)">
                                <path id="Path_145" data-name="Path 145" d="M1860.958,1045.968h-23.465c-.018-.239-.039-.475-.052-.711a13.723,13.723,0,0,1,.131-3.148,4.885,4.885,0,0,1,2.6-3.586q.807-.444,1.634-.849a26.338,26.338,0,0,0,3.64-2.046c.039.059.073.109.1.161q1.458,2.428,2.918,4.855a.24.24,0,0,1,.01.287.887.887,0,0,0,.275,1.179,1.338,1.338,0,0,1,.621,1.115c.011.18,0,.361,0,.554.155-.011.291-.014.424-.035a.153.153,0,0,0,.1-.1c.1-.75.207-1.5.275-2.252a1.741,1.741,0,0,0-.162-.56c-.015-.052-.036-.123-.013-.161q1.476-2.516,2.962-5.028a.222.222,0,0,1,.034-.032c.163.106.33.213.5.322a30.3,30.3,0,0,0,3.217,1.757c.675.339,1.349.687,1.992,1.08a4.775,4.775,0,0,1,2.247,3.592,15.331,15.331,0,0,1,.035,3.559A.243.243,0,0,1,1860.958,1045.968Zm-19.135-.217v-7.9c-.705.4-1.369.784-2.036,1.161a.3.3,0,0,0-.163.3q.007,3.124,0,6.248c0,.061.005.122.009.191Zm14.826-7.856v7.856h2.181a.985.985,0,0,0,.016-.123q0-3.192,0-6.384a.255.255,0,0,0-.088-.181A14.505,14.505,0,0,0,1856.649,1037.9Zm-9.153,7.856c.005-.045.012-.073.012-.1q0-3.028,0-6.057a.251.251,0,0,0-.109-.18,5.173,5.173,0,0,1-1.985-2.13c-.024-.047-.053-.091-.1-.17v8.637Zm5.664,0v-8.437a5.323,5.323,0,0,1-2.1,2.062.275.275,0,0,0-.089.209q-.007,2.988,0,5.975v.192Z" transform="translate(0 -126.917)" fill="#4f4f4f"></path>
                                <path id="Path_146" data-name="Path 146" d="M1925.2,908.429v-.679l-.173.2a3.918,3.918,0,0,1-2.148,1.4,3.237,3.237,0,0,1-2.928-.8,10.206,10.206,0,0,1-.813-.87c-.037-.04-.067-.087-.129-.167v.735a.237.237,0,0,1-.208-.287,2.424,2.424,0,0,0-.292-1.365,17.488,17.488,0,0,1-.649-1.755.592.592,0,0,0-.125-.211,1.4,1.4,0,0,1-.355-.689,3.807,3.807,0,0,1,.052-1.956,4.482,4.482,0,0,0,.083-.675,5.569,5.569,0,0,1,1.3-3.1,4.492,4.492,0,0,1,7.357.838,6.355,6.355,0,0,1,.736,2.624,1.11,1.11,0,0,0,.065.278,3.184,3.184,0,0,1-.031,2.316,1.969,1.969,0,0,1-.319.41.464.464,0,0,0-.1.148,8.793,8.793,0,0,1-1.071,2.553.37.37,0,0,0-.044.176,2.419,2.419,0,0,0,0,.392A.522.522,0,0,1,1925.2,908.429Zm-2.853-11.56a4.339,4.339,0,0,0-3.147,1.245,5.334,5.334,0,0,0-1.489,3.326c-.031.269-.078.537-.133.8a3.392,3.392,0,0,0,.04,1.737,2.64,2.64,0,0,0,.3.522,1.042,1.042,0,0,1,.12.191c.125.384.223.776.363,1.154a5.922,5.922,0,0,0,1.635,2.5,3.028,3.028,0,0,0,3.214.668,3.987,3.987,0,0,0,1.79-1.428,7.846,7.846,0,0,0,1.263-2.795.433.433,0,0,1,.214-.319.6.6,0,0,0,.232-.3,2.8,2.8,0,0,0,.166-.641,2.912,2.912,0,0,0-.158-1.526.767.767,0,0,1-.064-.241,6.216,6.216,0,0,0-.506-2.182A4.284,4.284,0,0,0,1922.35,896.869Z" transform="translate(-72.956 0)" fill="#4f4f4f"></path>
                                <path id="Path_147" data-name="Path 147" d="M1958.494,1066.4c.379.175.753.344,1.125.52a.48.48,0,0,0,.438,0c.352-.165.708-.322,1.077-.489l-1.3,2.2Z" transform="translate(-110.602 -155.042)" fill="#4f4f4f"></path>
                                <path id="Path_148" data-name="Path 148" d="M1935.669,1037.216l-.253.135c-.083-.136-.163-.265-.241-.4l-2.779-4.636c-.023-.039-.064-.08-.062-.118,0-.061.017-.147.058-.172s.122,0,.18.024c.026.009.041.052.058.081l2.99,4.987C1935.636,1037.15,1935.651,1037.181,1935.669,1037.216Z" transform="translate(-86.706 -123.637)" fill="#4f4f4f"></path>
                                <path id="Path_149" data-name="Path 149" d="M1977.472,1037.372l-.262-.121.6-1.028,2.345-3.981c.023-.039.039-.093.073-.112.053-.029.143-.066.175-.042a.3.3,0,0,1,.071.183c0,.031-.034.069-.054.1l-2.874,4.876C1977.528,1037.29,1977.5,1037.327,1977.472,1037.372Z" transform="translate(-127.698 -123.693)" fill="#4f4f4f"></path>
                                <path id="Path_150" data-name="Path 150" d="M1969.1,1096.744a.47.47,0,0,1,.472.461.466.466,0,0,1-.933.012A.47.47,0,0,1,1969.1,1096.744Z" transform="translate(-119.872 -182.758)" fill="#4f4f4f"></path>
                            </g>
                        </svg>
                    </i>
                    Edit Judge Request
                </button>
            @else
                <button data-toggle="modal" data-target="#exampleModal" class="btn" style="{{ Request::segment(1) === 'my_judgement' ? 'background:#fabf02' : null }}">
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="23.656" height="22.388" viewBox="0 0 23.656 22.388">
                            <g id="Group_137" data-name="Group 137" transform="translate(-1837.408 -896.663)">
                                <path id="Path_145" data-name="Path 145" d="M1860.958,1045.968h-23.465c-.018-.239-.039-.475-.052-.711a13.723,13.723,0,0,1,.131-3.148,4.885,4.885,0,0,1,2.6-3.586q.807-.444,1.634-.849a26.338,26.338,0,0,0,3.64-2.046c.039.059.073.109.1.161q1.458,2.428,2.918,4.855a.24.24,0,0,1,.01.287.887.887,0,0,0,.275,1.179,1.338,1.338,0,0,1,.621,1.115c.011.18,0,.361,0,.554.155-.011.291-.014.424-.035a.153.153,0,0,0,.1-.1c.1-.75.207-1.5.275-2.252a1.741,1.741,0,0,0-.162-.56c-.015-.052-.036-.123-.013-.161q1.476-2.516,2.962-5.028a.222.222,0,0,1,.034-.032c.163.106.33.213.5.322a30.3,30.3,0,0,0,3.217,1.757c.675.339,1.349.687,1.992,1.08a4.775,4.775,0,0,1,2.247,3.592,15.331,15.331,0,0,1,.035,3.559A.243.243,0,0,1,1860.958,1045.968Zm-19.135-.217v-7.9c-.705.4-1.369.784-2.036,1.161a.3.3,0,0,0-.163.3q.007,3.124,0,6.248c0,.061.005.122.009.191Zm14.826-7.856v7.856h2.181a.985.985,0,0,0,.016-.123q0-3.192,0-6.384a.255.255,0,0,0-.088-.181A14.505,14.505,0,0,0,1856.649,1037.9Zm-9.153,7.856c.005-.045.012-.073.012-.1q0-3.028,0-6.057a.251.251,0,0,0-.109-.18,5.173,5.173,0,0,1-1.985-2.13c-.024-.047-.053-.091-.1-.17v8.637Zm5.664,0v-8.437a5.323,5.323,0,0,1-2.1,2.062.275.275,0,0,0-.089.209q-.007,2.988,0,5.975v.192Z" transform="translate(0 -126.917)" fill="#4f4f4f"></path>
                                <path id="Path_146" data-name="Path 146" d="M1925.2,908.429v-.679l-.173.2a3.918,3.918,0,0,1-2.148,1.4,3.237,3.237,0,0,1-2.928-.8,10.206,10.206,0,0,1-.813-.87c-.037-.04-.067-.087-.129-.167v.735a.237.237,0,0,1-.208-.287,2.424,2.424,0,0,0-.292-1.365,17.488,17.488,0,0,1-.649-1.755.592.592,0,0,0-.125-.211,1.4,1.4,0,0,1-.355-.689,3.807,3.807,0,0,1,.052-1.956,4.482,4.482,0,0,0,.083-.675,5.569,5.569,0,0,1,1.3-3.1,4.492,4.492,0,0,1,7.357.838,6.355,6.355,0,0,1,.736,2.624,1.11,1.11,0,0,0,.065.278,3.184,3.184,0,0,1-.031,2.316,1.969,1.969,0,0,1-.319.41.464.464,0,0,0-.1.148,8.793,8.793,0,0,1-1.071,2.553.37.37,0,0,0-.044.176,2.419,2.419,0,0,0,0,.392A.522.522,0,0,1,1925.2,908.429Zm-2.853-11.56a4.339,4.339,0,0,0-3.147,1.245,5.334,5.334,0,0,0-1.489,3.326c-.031.269-.078.537-.133.8a3.392,3.392,0,0,0,.04,1.737,2.64,2.64,0,0,0,.3.522,1.042,1.042,0,0,1,.12.191c.125.384.223.776.363,1.154a5.922,5.922,0,0,0,1.635,2.5,3.028,3.028,0,0,0,3.214.668,3.987,3.987,0,0,0,1.79-1.428,7.846,7.846,0,0,0,1.263-2.795.433.433,0,0,1,.214-.319.6.6,0,0,0,.232-.3,2.8,2.8,0,0,0,.166-.641,2.912,2.912,0,0,0-.158-1.526.767.767,0,0,1-.064-.241,6.216,6.216,0,0,0-.506-2.182A4.284,4.284,0,0,0,1922.35,896.869Z" transform="translate(-72.956 0)" fill="#4f4f4f"></path>
                                <path id="Path_147" data-name="Path 147" d="M1958.494,1066.4c.379.175.753.344,1.125.52a.48.48,0,0,0,.438,0c.352-.165.708-.322,1.077-.489l-1.3,2.2Z" transform="translate(-110.602 -155.042)" fill="#4f4f4f"></path>
                                <path id="Path_148" data-name="Path 148" d="M1935.669,1037.216l-.253.135c-.083-.136-.163-.265-.241-.4l-2.779-4.636c-.023-.039-.064-.08-.062-.118,0-.061.017-.147.058-.172s.122,0,.18.024c.026.009.041.052.058.081l2.99,4.987C1935.636,1037.15,1935.651,1037.181,1935.669,1037.216Z" transform="translate(-86.706 -123.637)" fill="#4f4f4f"></path>
                                <path id="Path_149" data-name="Path 149" d="M1977.472,1037.372l-.262-.121.6-1.028,2.345-3.981c.023-.039.039-.093.073-.112.053-.029.143-.066.175-.042a.3.3,0,0,1,.071.183c0,.031-.034.069-.054.1l-2.874,4.876C1977.528,1037.29,1977.5,1037.327,1977.472,1037.372Z" transform="translate(-127.698 -123.693)" fill="#4f4f4f"></path>
                                <path id="Path_150" data-name="Path 150" d="M1969.1,1096.744a.47.47,0,0,1,.472.461.466.466,0,0,1-.933.012A.47.47,0,0,1,1969.1,1096.744Z" transform="translate(-119.872 -182.758)" fill="#4f4f4f"></path>
                            </g>
                        </svg>
                    </i>
                    Become a Judge
                </button>
            @endif
        @else
            <a href="{{route('frontend.user.details_judgement')}}" class="btn" style="{{ Request::segment(1) === 'my_judgement' ? 'background:#fabf02' : null }}">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="23.656" height="22.388" viewBox="0 0 23.656 22.388">
                        <g id="Group_137" data-name="Group 137" transform="translate(-1837.408 -896.663)">
                            <path id="Path_145" data-name="Path 145" d="M1860.958,1045.968h-23.465c-.018-.239-.039-.475-.052-.711a13.723,13.723,0,0,1,.131-3.148,4.885,4.885,0,0,1,2.6-3.586q.807-.444,1.634-.849a26.338,26.338,0,0,0,3.64-2.046c.039.059.073.109.1.161q1.458,2.428,2.918,4.855a.24.24,0,0,1,.01.287.887.887,0,0,0,.275,1.179,1.338,1.338,0,0,1,.621,1.115c.011.18,0,.361,0,.554.155-.011.291-.014.424-.035a.153.153,0,0,0,.1-.1c.1-.75.207-1.5.275-2.252a1.741,1.741,0,0,0-.162-.56c-.015-.052-.036-.123-.013-.161q1.476-2.516,2.962-5.028a.222.222,0,0,1,.034-.032c.163.106.33.213.5.322a30.3,30.3,0,0,0,3.217,1.757c.675.339,1.349.687,1.992,1.08a4.775,4.775,0,0,1,2.247,3.592,15.331,15.331,0,0,1,.035,3.559A.243.243,0,0,1,1860.958,1045.968Zm-19.135-.217v-7.9c-.705.4-1.369.784-2.036,1.161a.3.3,0,0,0-.163.3q.007,3.124,0,6.248c0,.061.005.122.009.191Zm14.826-7.856v7.856h2.181a.985.985,0,0,0,.016-.123q0-3.192,0-6.384a.255.255,0,0,0-.088-.181A14.505,14.505,0,0,0,1856.649,1037.9Zm-9.153,7.856c.005-.045.012-.073.012-.1q0-3.028,0-6.057a.251.251,0,0,0-.109-.18,5.173,5.173,0,0,1-1.985-2.13c-.024-.047-.053-.091-.1-.17v8.637Zm5.664,0v-8.437a5.323,5.323,0,0,1-2.1,2.062.275.275,0,0,0-.089.209q-.007,2.988,0,5.975v.192Z" transform="translate(0 -126.917)" fill="#4f4f4f"></path>
                            <path id="Path_146" data-name="Path 146" d="M1925.2,908.429v-.679l-.173.2a3.918,3.918,0,0,1-2.148,1.4,3.237,3.237,0,0,1-2.928-.8,10.206,10.206,0,0,1-.813-.87c-.037-.04-.067-.087-.129-.167v.735a.237.237,0,0,1-.208-.287,2.424,2.424,0,0,0-.292-1.365,17.488,17.488,0,0,1-.649-1.755.592.592,0,0,0-.125-.211,1.4,1.4,0,0,1-.355-.689,3.807,3.807,0,0,1,.052-1.956,4.482,4.482,0,0,0,.083-.675,5.569,5.569,0,0,1,1.3-3.1,4.492,4.492,0,0,1,7.357.838,6.355,6.355,0,0,1,.736,2.624,1.11,1.11,0,0,0,.065.278,3.184,3.184,0,0,1-.031,2.316,1.969,1.969,0,0,1-.319.41.464.464,0,0,0-.1.148,8.793,8.793,0,0,1-1.071,2.553.37.37,0,0,0-.044.176,2.419,2.419,0,0,0,0,.392A.522.522,0,0,1,1925.2,908.429Zm-2.853-11.56a4.339,4.339,0,0,0-3.147,1.245,5.334,5.334,0,0,0-1.489,3.326c-.031.269-.078.537-.133.8a3.392,3.392,0,0,0,.04,1.737,2.64,2.64,0,0,0,.3.522,1.042,1.042,0,0,1,.12.191c.125.384.223.776.363,1.154a5.922,5.922,0,0,0,1.635,2.5,3.028,3.028,0,0,0,3.214.668,3.987,3.987,0,0,0,1.79-1.428,7.846,7.846,0,0,0,1.263-2.795.433.433,0,0,1,.214-.319.6.6,0,0,0,.232-.3,2.8,2.8,0,0,0,.166-.641,2.912,2.912,0,0,0-.158-1.526.767.767,0,0,1-.064-.241,6.216,6.216,0,0,0-.506-2.182A4.284,4.284,0,0,0,1922.35,896.869Z" transform="translate(-72.956 0)" fill="#4f4f4f"></path>
                            <path id="Path_147" data-name="Path 147" d="M1958.494,1066.4c.379.175.753.344,1.125.52a.48.48,0,0,0,.438,0c.352-.165.708-.322,1.077-.489l-1.3,2.2Z" transform="translate(-110.602 -155.042)" fill="#4f4f4f"></path>
                            <path id="Path_148" data-name="Path 148" d="M1935.669,1037.216l-.253.135c-.083-.136-.163-.265-.241-.4l-2.779-4.636c-.023-.039-.064-.08-.062-.118,0-.061.017-.147.058-.172s.122,0,.18.024c.026.009.041.052.058.081l2.99,4.987C1935.636,1037.15,1935.651,1037.181,1935.669,1037.216Z" transform="translate(-86.706 -123.637)" fill="#4f4f4f"></path>
                            <path id="Path_149" data-name="Path 149" d="M1977.472,1037.372l-.262-.121.6-1.028,2.345-3.981c.023-.039.039-.093.073-.112.053-.029.143-.066.175-.042a.3.3,0,0,1,.071.183c0,.031-.034.069-.054.1l-2.874,4.876C1977.528,1037.29,1977.5,1037.327,1977.472,1037.372Z" transform="translate(-127.698 -123.693)" fill="#4f4f4f"></path>
                            <path id="Path_150" data-name="Path 150" d="M1969.1,1096.744a.47.47,0,0,1,.472.461.466.466,0,0,1-.933.012A.47.47,0,0,1,1969.1,1096.744Z" transform="translate(-119.872 -182.758)" fill="#4f4f4f"></path>
                        </g>
                    </svg>
                </i>
                My Judge
            </a>
        @endif

        <a href="{{route('frontend.user.register_as_organizer')}}" style="{{ Request::segment(1) === 'create_event' ? 'background:#fabf02' : null }}" class="btn"><i><svg xmlns="http://www.w3.org/2000/svg" width="22.779" height="26.563" viewBox="0 0 22.779 26.563">
                    <g id="Group_139" data-name="Group 139" transform="translate(-2043.951 477.837)">
                        <path id="Path_151" data-name="Path 151" d="M2333.594-470.949l0-.051h0A.506.506,0,0,0,2333.594-470.949Z" transform="translate(-277.615 -6.553)" fill="#4f4f4f"></path>
                        <path id="Path_152" data-name="Path 152" d="M2173.2-316.305c1.222-.755,2.275-.7,3.1.15a2.257,2.257,0,0,1,.06,3.013c.165.169.331.342.5.512.376.377.756.75,1.131,1.127a1.461,1.461,0,0,1,.133,1.946.562.562,0,0,1-.42.225,15.53,15.53,0,0,0-4.4.978c-.663.27-1.291.626-1.928.955-.119.061-.182.068-.28-.03q-1.82-1.832-3.651-3.654a.166.166,0,0,1-.021-.249,13,13,0,0,0,1.827-5.244c.056-.376.085-.756.148-1.13a.583.583,0,0,1,.166-.314,1.413,1.413,0,0,1,1.893.007c.543.5,1.053,1.039,1.578,1.56C2173.093-316.4,2173.15-316.352,2173.2-316.305Zm2.566,2.5a1.33,1.33,0,0,0-.153-1.818,1.309,1.309,0,0,0-1.745-.063Z" transform="translate(-118.307 -152.837)" fill="#4f4f4f"></path>
                        <path id="Path_153" data-name="Path 153" d="M2058.828-128.764l3.7,3.706c-.133.124-.277.25-.413.385-1.082,1.08-2.159,2.164-3.245,3.241a1.731,1.731,0,0,1-2.507-.016c-.4-.4-.806-.8-1.2-1.208a1.708,1.708,0,0,1,.019-2.412c1.011-1.024,2.033-2.037,3.047-3.058C2058.437-128.33,2058.628-128.548,2058.828-128.764Z" transform="translate(-10.282 -334.581)" fill="#4f4f4f"></path>
                        <path id="Path_154" data-name="Path 154" d="M2333.614-419.113a7.577,7.577,0,0,1,6.085,3.23,7.451,7.451,0,0,1,1.343,3.375,11.247,11.247,0,0,1,.062,1.344.4.4,0,0,1-.373.418.4.4,0,0,1-.4-.415c-.026-.427-.027-.857-.084-1.28a6.6,6.6,0,0,0-2.206-4.135,6.79,6.79,0,0,0-4.822-1.77c-.251,0-.4-.077-.465-.267a.339.339,0,0,1,.117-.408.481.481,0,0,1,.244-.088C2333.281-419.123,2333.448-419.113,2333.614-419.113Z" transform="translate(-276.791 -56.283)" fill="#4f4f4f"></path>
                        <path id="Path_155" data-name="Path 155" d="M2334.508-360.065a5.071,5.071,0,0,1,4.437,2.657,5.013,5.013,0,0,1,.646,2.767c-.011.283-.165.461-.4.457s-.388-.194-.377-.476a4.309,4.309,0,0,0-.967-2.987,4.4,4.4,0,0,0-3.631-1.667.744.744,0,0,1-.339-.053.343.343,0,0,1-.164-.411.344.344,0,0,1,.318-.283C2334.189-360.074,2334.349-360.065,2334.508-360.065Z" transform="translate(-277.719 -112.88)" fill="#4f4f4f"></path>
                        <path id="Path_156" data-name="Path 156" d="M2045.973,25.581c-.26.384-.6.433-.9.141-.318-.307-.633-.618-.938-.938a.519.519,0,0,1,.036-.815.188.188,0,0,1,.182,0C2044.892,24.5,2045.428,25.037,2045.973,25.581Z" transform="translate(0 -480.951)" fill="#4f4f4f"></path>
                        <path id="Path_157" data-name="Path 157" d="M2344.4-467.428a.4.4,0,0,1-.386.362.409.409,0,0,1-.381-.394c-.016-.379-.017-.76-.044-1.139a8.831,8.831,0,0,0-1.165-3.75A9.151,9.151,0,0,0,2339-475.8a8.8,8.8,0,0,0-3.66-1.181c-.371-.033-.745-.042-1.118-.049-.354-.006-.493-.078-.544-.345a.062.062,0,0,1,0-.008c-.007-.037-.012-.078-.016-.123,0-.018,0-.035,0-.051a.32.32,0,0,1,.055-.194,7.344,7.344,0,0,1,3.014.194c.642.231,1.309.412,1.922.7a9.856,9.856,0,0,1,4.871,4.947,9.94,9.94,0,0,1,.889,4.1A3.117,3.117,0,0,1,2344.4-467.428Z" transform="translate(-277.681 0)" fill="#4f4f4f"></path>
                        <path id="Path_158" data-name="Path 158" d="M2333.68-469.78a1.182,1.182,0,0,0,.016.123A.789.789,0,0,1,2333.68-469.78Z" transform="translate(-277.701 -7.722)" fill="#4f4f4f"></path>
                        <path id="Path_159" data-name="Path 159" d="M2334.062-466.8v0s0,0,0-.006S2334.061-466.8,2334.062-466.8Z" transform="translate(-278.065 -10.569)" fill="#4f4f4f"></path>
                        <g id="Group_138" data-name="Group 138" transform="translate(2049.711 -458.616)">
                            <path id="Path_160" data-name="Path 160" d="M2187.294-7.489a4,4,0,0,0,.579-.437c.417-.443.806-.912,1.207-1.369a.839.839,0,0,0,0-1.226q-1.878-2.078-3.762-4.15a.324.324,0,0,0-.546-.015c-.615.617-1.233,1.232-1.841,1.855a.821.821,0,0,0-.2.352,1.71,1.71,0,0,0,.743,1.763,1.931,1.931,0,0,1,.5.519c.157.225.424.37.6.585s.259.526.464.7a3.4,3.4,0,0,1,.716.8,1.644,1.644,0,0,0,.847.6A4.512,4.512,0,0,0,2187.294-7.489Z" transform="translate(-2182.694 14.828)" fill="#4f4f4f"></path>
                        </g>
                    </g>
                </svg>
            </i> Create a Event</a>
        <button class="btn"><i><svg xmlns="http://www.w3.org/2000/svg" width="18.893" height="20.791" viewBox="0 0 18.893 20.791">
                    <path id="Path_139" data-name="Path 139" d="M2890.719,1604.451h-11.1c.2-1.647.347-3.266.649-4.854.058-.3.72-.629,1.144-.7a15.037,15.037,0,0,1,2.3-.031c.169-1.2.374-2.311.455-3.432a1.367,1.367,0,0,0-.484-1c-1.793-1.384-3.336-3.069-5.541-3.946a4,4,0,0,1-2.032-5.21,1.891,1.891,0,0,1,1.157-.759c3.782-1.1,7.673-.866,11.531-.766a27.358,27.358,0,0,1,4.925.866,1.223,1.223,0,0,1,.714.732c.75,2.254-.174,4.2-2.294,5.409-1.69.962-3.257,2.139-4.9,3.188a2.135,2.135,0,0,0-.981,2.573c.171.7.229,1.432.367,2.349.782,0,1.542,0,2.3,0a1.1,1.1,0,0,1,1.262,1.12C2890.331,1601.429,2890.528,1602.863,2890.719,1604.451Zm-.112-18.713v4.286c2.657-1.04,3.192-1.988,2.461-4.286Zm-3.6,1.407-1.721-1.32-1.78,1.306.63,2.035h2.2Zm-9.68-1.4c-.371,2.638.175,3.551,2.081,3.8v-3.8Z" transform="translate(-2875.803 -1583.661)" fill="#4f4f4f"></path>
                </svg>
            </i> My Score</button>
        <a href="{{route('frontend.user.my_leader_board')}}" class="btn"  style="{{ Request::segment(1) === 'my_leader_board' ? 'background:#fabf02' : null }}"><i><svg xmlns="http://www.w3.org/2000/svg" width="20.656" height="20.673" viewBox="0 0 20.656 20.673">
                    <path id="Path_144" data-name="Path 144" d="M3225.515,1346.037a10.328,10.328,0,1,1-10.134-10.365A10.33,10.33,0,0,1,3225.515,1346.037Zm-11.779-.054c0,1.314,0,2.628,0,3.942,0,.423.16.581.583.585.576.005,1.153,0,1.729,0,.427,0,.6-.155.6-.569q.009-3.921,0-7.843c0-.435-.176-.586-.627-.588q-.825-.005-1.649,0c-.495,0-.638.149-.638.654Q3213.733,1344.072,3213.735,1345.983Zm6.75,1c0-.952,0-1.905,0-2.857,0-.5-.151-.643-.65-.646-.55,0-1.1,0-1.65,0-.474.005-.636.156-.637.628q-.008,2.877,0,5.755c0,.44.17.6.618.605.563.009,1.126.008,1.689,0,.471,0,.627-.162.629-.631C3220.487,1348.886,3220.484,1347.934,3220.486,1346.982Zm-7.653.877c0-.629,0-1.259,0-1.888,0-.434-.178-.6-.615-.6q-.844-.006-1.687,0c-.459,0-.631.166-.633.629q-.009,1.909,0,3.818c0,.424.193.606.62.611q.844.008,1.688,0c.448,0,.625-.185.629-.638C3212.837,1349.145,3212.833,1348.5,3212.833,1347.859Z" transform="translate(-3204.859 -1335.672)" fill="#4f4f4f"></path>
                </svg>
            </i> Leaderboard</a>
    </div>

    <div class="buttom-icon">
        <div class="row">
            <i><svg xmlns="http://www.w3.org/2000/svg" width="19.237" height="19.242" viewBox="0 0 19.237 19.242">
                    <path id="Icon_ionic-ios-settings" data-name="Icon ionic-ios-settings" d="M22.149,14.118a2.475,2.475,0,0,1,1.588-2.309,9.812,9.812,0,0,0-1.187-2.86,2.509,2.509,0,0,1-1.007.215,2.47,2.47,0,0,1-2.259-3.477A9.782,9.782,0,0,0,16.428,4.5a2.473,2.473,0,0,1-4.619,0,9.812,9.812,0,0,0-2.86,1.187A2.47,2.47,0,0,1,6.689,9.164a2.427,2.427,0,0,1-1.007-.215A10.029,10.029,0,0,0,4.5,11.814a2.475,2.475,0,0,1,.005,4.619,9.812,9.812,0,0,0,1.187,2.86,2.471,2.471,0,0,1,3.261,3.261,9.869,9.869,0,0,0,2.86,1.187,2.469,2.469,0,0,1,4.609,0,9.812,9.812,0,0,0,2.86-1.187,2.473,2.473,0,0,1,3.261-3.261,9.869,9.869,0,0,0,1.187-2.86A2.487,2.487,0,0,1,22.149,14.118Zm-7.985,4a4.008,4.008,0,1,1,4.008-4.008A4.007,4.007,0,0,1,14.164,18.121Z" transform="translate(-4.5 -4.5)" fill="#fff" opacity="0.5"></path>
                </svg>
            </i>
            <i><svg xmlns="http://www.w3.org/2000/svg" width="22.477" height="22.478" viewBox="0 0 22.477 22.478">
                    <g id="Icon_feather-minimize-2" data-name="Icon feather-minimize-2" transform="translate(-2.379 -2.379)" opacity="0.5">
                        <path id="Path_140" data-name="Path 140" d="M6,21h6.078v6.078" transform="translate(-0.487 -5.356)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"></path>
                        <path id="Path_141" data-name="Path 141" d="M27.078,12.078H21V6" transform="translate(-5.356 -0.487)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"></path>
                        <path id="Path_142" data-name="Path 142" d="M21,11.591,28.091,4.5" transform="translate(-5.356)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"></path>
                        <path id="Path_143" data-name="Path 143" d="M4.5,28.091,11.591,21" transform="translate(0 -5.356)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"></path>
                    </g>
                </svg>
            </i>
            <i><svg xmlns="http://www.w3.org/2000/svg" width="19.242" height="19.242" viewBox="0 0 19.242 19.242">
                    <path id="Icon_material-swap-vertical-circle" data-name="Icon material-swap-vertical-circle" d="M12.621,3a9.621,9.621,0,1,0,9.621,9.621A9.624,9.624,0,0,0,12.621,3ZM7.329,9.735,10.7,6.367l3.367,3.367H11.659v3.848H9.735V9.735Zm10.583,5.773-3.367,3.367-3.367-3.367h2.405V11.659h1.924v3.848Z" transform="translate(-3 -3)" fill="#fff" opacity="0.5"></path>
                </svg>
            </i>
            <i><svg xmlns="http://www.w3.org/2000/svg" width="18.235" height="20.84" viewBox="0 0 18.235 20.84">
                    <path id="Icon_metro-switch" data-name="Icon metro-switch" d="M16.221,4.911V7.678a6.5,6.5,0,1,1-5.21,0V4.911a9.117,9.117,0,1,0,5.21,0ZM12.314,1.928h2.6v10.42h-2.6Z" transform="translate(-4.499 -1.928)" fill="#fff" opacity="0.5"></path>
                </svg>
            </i>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Become a Judge</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('frontend.user.judge_form')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            <div class="form-group">
                <label class="form-label">Name <span class="text-danger">*</span></label>
                <input type="text" name="judge_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="form-label">Institute <span class="text-danger">*</span></label>
                <input type="text" name="institute" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="form-label">Introduction <span class="text-danger">*</span></label>
                <textarea type="text" name="introduction" class="form-control" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Skills <span class="text-danger">*</span></label>
                <textarea type="text" name="skills" class="form-control" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">ID Card <span class="text-danger">*</span></label>
                <input type="file" name="id_card" class="form-control" required>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Send Request</button>
        </div>
        </form>
    </div>
  </div>
</div>

