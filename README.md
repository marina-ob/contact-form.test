# お問い合わせフォーム
## 環境構築
 Dockerビルド  
　　１.git clone  
　　２.docker-compose up -d --build  
　　
 ＊MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせてdocker-compose.ymlファイルを編集してください。　　
　　
　Laravel環境構築　　
  
　　１.docker-compose exec php bash  
  　2.composer install　　
　　３..env.exampleファイルから.envを作成し、環境変数を変更  
　　４.php artisan key:generate  
　　５.php artisan migrate  
　　６.php artisan db:seed  
  
## 使用技術  
  
　・PHP   
　・Laravel  
　・MySQL  
 
## URL
　・開発環境：http://localhost/  
　・phpMyAdmin：http://localhost:8080/
 
