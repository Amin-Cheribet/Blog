@extends('template/main')

@section('head')
    <link rel="stylesheet" href="/css/post.css">
    <title>Blog!</title>
@endsection

@section('body')
    <div class='head-container'>
        <div class='cover-img'>
            <div class="cover-img"></div>
            <div class="highlight"></div>
        </div>
    </div>
    <div class="content">
        <div class="title-container">
            <div class="title">
                This is My post Title for this Blog
            </div>
            <div class="description">
                This is my post description sdflks lsqit and how lsdk sdlk sns qsfkl
                sfdlsjl kdqsjkfh sfnjk eiuz kjfdskjlk fslkjsd fo
            </div>
        </div>
        <div class="post-container">
            <div class="post">

    In a nutshell,
    someone with a fixed mindset believes we are what we are, and that things — meaning personality traits, capabilities, beliefs about ourselves, etc. — don’t really change. For example, with a fixed mindset, if I’m bad at maths, then that’s just the way I am. I’ll always be bad at maths. There really isn’t any point in trying to improve my skills. If I believe myself to not be a funny person, then that will continue to be my destiny, etc.

    On the other hand, an individual with a growth mindset believes in constant evolution. I am what I am now, but that’s different from what I was before, and what I will be in the future. If I’m bad at maths now, I can work at it and potentially become a maths genius — given the proper motivation, of course. If I don’t find myself to be very funny now, I can practice my joke-telling skills and comedic delivery, and maybe I’ll have them rolling in the aisles one day. Everything is a matter of effort.

    Some people tend more toward a fixed mindset, and others toward that of growth, but it’s not entirely binary. Most of us will shift between the two outlooks depending on our situation.

    The way we evaluate our personal sense of worth, success and ability differs depending on our mindset. The fixed mindset individual judges themselves against others. In order to feel good at something, they have to be better than everyone else around them, or at least somewhere near the top. When this is the case, fear of failure is ramped up, and they’ll be likely to shy away from challenges, even — in fact especially — in the areas they consider themselves gifted. This is because any failure suffered threatens to jeopardise their “talented” status. One slip up and they’re no longer the genius they, or others, thought they were. Better to not risk it at all.

    Furthermore, this mindset breeds arrogance, because — looking down from their fiercely protected spot at the top of the heap — a fixed mindset individual genuinely feels superior to the people they surround themselves with. In fact, they need to think in this way in order to feel of worth.

    The growth mindset individual though, will feel successful, worthy, and purposeful when they’re learning. What this essentially means is that failure, as a concrete idea or our general understanding of it, doesn’t really exist, because the harder a task or an undertaking is, the more we stand to grow as a result of doing it — even if we don’t do it perfectly. With a growth mindset, we welcome challenge because instant success and recognition are not the ultimate goals.

    Needless to say, in the long run growth-minded people have the potential to go further, and grow bigger, in all aspects of their lives.

    So how does this apply to being great company?
    Some fixed-minded people tend to act in a way that can make us feel small, and they seem to relish that outcome. They’re the ones who smirk when we slip up, the ones we wouldn’t want to show an unfinished project to, or see us in tracksuit trousers and a battered t-shirt first thing on a Sunday morning. They’re the ones we wouldn’t want to say anything stupid in front of, and if we did, we would feel the need to justify ourselves to save face.

    If someone slips into a fixed mindset, suddenly everything and everyone around them begins to function like a mirror. They’re forced into a perpetual state of self-referencing. They ask: “How does this friend, topic, job, choice of music, etc. make me look?” And it can be contagious. Like a bitchy, competitive group of school children, every
            </div>
            <div class="comments">
                <div class="comment">
                    <div class="profile-photo-container">
                        <div class="profile-photo">
                            <img src="#" alt="Photo">
                        </div>
                    </div>
                    <div class="username-container">
                        Mohamed Amine
                    </div>
                    <div class="comment-text">
                        i slk flkjq lknfkj dsqjfbe jrfnksdfnjezhg jksfd
                        sdfqkj sqdlfjknkjzea riubgsd jjkfsd sdjkq
                    </div>
                </div>
                <div class="comment">
                    <div class="profile-photo-container">
                        <div class="profile-photo">
                            <img src="#" alt="Photo">
                        </div>
                    </div>
                    <div class="username-container">
                        Mohamed Amine
                    </div>
                    <div class="comment-text">
                        i slk flkjq lknfkj dsqjfbe jrfnksdfnjezhg jksfd
                        sdfqkj sqdlfjknkjzea riubgsd jjkfsd sdjkq
                    </div>
                </div>
                <div class="comment">
                    <div class="profile-photo-container">
                        <div class="profile-photo">
                            <img src="#" alt="Photo">
                        </div>
                    </div>
                    <div class="username-container">
                        Mohamed Amine
                    </div>
                    <div class="comment-text">
                        i slk flkjq lknfkj dsqjfbe jrfnksdfnjezhg jksfd
                        sdfqkj sqdlfjknkjzea riubgsd jjkfsd sdjkq
                    </div>
                </div>
                <div class="comment">
                    <div class="profile-photo-container">
                        <div class="profile-photo">
                            <img src="#" alt="Photo">
                        </div>
                    </div>
                    <div class="username-container">
                        Mohamed Amine
                    </div>
                    <div class="comment-text">
                        i slk flkjq lknfkj dsqjfbe jrfnksdfnjezhg jksfd
                        sdfqkj sqdlfjknkjzea riubgsd jjkfsd sdjkq
                    </div>
                </div>
            </div>
            <div class="comment-form">
                <form action="" method="post">
                    <table>
                        <tr>
                            <td>
                                <textarea name="comment" rows="7"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="submit" value="Comment">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection
