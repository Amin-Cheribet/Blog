<div class="login-form display">
    <div class="login">
        <div class="loginErrors errorBox"></div>
        <form id="login-form" action="{{url('user/login')}}" method="post">
             {{ csrf_field() }}
            <table>
                <tr>
                    <td><label>E-mail :</label></td>
                    <td><input type="text" name="email" placeholder="Your E-mail"></td>
                </tr>
                <tr>
                    <td><label>Password :</label></td>
                    <td><input type="password" name="password" placeholder="Your Password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Log in">
                        <a class='subscribe-toggle'>Subscribe</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <div class="subscribe display">
        <div class="subscribeErrors errorBox"></div>
        <form id="subscribe-form" action="{{url('user')}}" method="post">
            {{csrf_field()}}
            <table>
                <tr>
                    <td><label for="">Name :</label></td>
                    <td><input type="text" name="name" placeholder="Your Name"></td>
                </tr>
                <tr>
                    <td><label>E-mail :</label></td>
                    <td><input type="text" name="email" placeholder="Your E-mail"></td>
                </tr>
                <tr>
                    <td><label>Password :</label></td>
                    <td><input type="password" name="password" placeholder="Your Password"></td>
                </tr>
                <tr>
                    <td><label>Confirme Password:</label></td>
                    <td><input type="password" name="password2" placeholder="Confirme Your Password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Subscribe">
                        <a class='subscribe-toggle'>Log in</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
