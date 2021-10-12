package com.example.employee_attendance;

import androidx.appcompat.app.AppCompatActivity;
import androidx.core.content.ContextCompat;

import android.os.Bundle;
import android.webkit.WebView;
import android.webkit.WebViewClient;

public class MainActivity extends AppCompatActivity {

    private WebView webView;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);


        getWindow().setStatusBarColor(ContextCompat.getColor(MainActivity.this,R.color.colorAccent));


        webView = findViewById(R.id.webview);
        webView.setWebViewClient(new webViewClient());
        webView.getSettings().setJavaScriptEnabled(true);
        webView.loadUrl("http://tuktuksrilankan.com/employee_attandance/public/");
    }



    @Override
    public void onBackPressed() {
        if (webView.canGoBack())
        {
            webView.goBack();
        }
        else
        {
            super.onBackPressed();
        }
    }
}