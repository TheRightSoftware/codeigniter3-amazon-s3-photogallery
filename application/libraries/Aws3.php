<?php
require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

class Aws3
{

	private $s3;
	private $bucket;
	private $base_url = 'https://cashback-system-images.s3.eu-west-2.amazonaws.com/';
	function __construct()
	{
		try {
			$this->bucket = 'Your AWS S3 Bucket name';
			$this->s3 = new S3Client([
				'region' => 'Your bucket region',
				'version' => 'Your bucket version',
				'credentials' => [
					'key' => 'xxxxxxxxxxxxxxxxxxxxxxx',
					'secret' => 'xxxxxxxxxxxxxxxxxxx',
				]
			]);
		} catch (Exception $e) {

			die("Error: " . $e->getMessage());
		}
	}

	public function sendfile($filename, $file)
	{

		try {
			$result = $this->s3->putObject(array(
				'Bucket' => $this->bucket,
				'Key' => "images/" . $filename,
				'Body' => file_get_contents("<resourses/images/" . $file)

			));
			return $result;
		} catch (Aws\S3\Exception\S3Exception $e) {
			die("Error: " . $e->getMessage());
		}
	}

	public function fileExist($file_name)
	{

		try {
			$file = $this->s3->getObject([
				'Bucket' => $this->bucket,
				'Key' => "images/" . $file_name,
			]);
			$body = $file->get('Body');
			$body->rewind();
			$success = "file updated";
			return $success;
		} catch (Aws\S3\Exception\S3Exception $e) {

			return $e->getMessage();
		}
	}



	public function get_all_files()
	{
		try {
			$contents = $this->s3->listObjects([
				'Bucket' => $this->bucket,
			]);
			if (isset($contents['Contents'])) {


				foreach ($contents['Contents'] as $content) {

					$pos_img = strpos($content['Key'], "/");
					$img = substr($content['Key'], $pos_img + 1);
					if (!empty($img)) {
						$objects[] = $img;
					}
				}

				//downloading the files from AWS if not exist in images folder 
				foreach ($objects as $value) {
					if (!file_exists("resourses/images/" . $value)) {
						$file = $this->s3->getObject([
							'Bucket' => $this->bucket,
							'Key' => "images/" . $value,
						]);

						file_put_contents('resourses/images/' . $value, $file['Body']);
					}
				}

				return $objects;
			} else {
				return null;
			}
		} catch (Aws\S3\Exception\S3Exception $exception) {
			echo "Failed to list objects in $this->bucket with error: " . $exception->getMessage();
			exit("Please fix error with listing objects before continuing.");
		}
	}
	public function delete_file($file_name)
	{
		try {
			$this->s3->deleteObject([
				'Bucket' => $this->bucket,
				'Key' => "images/" . $file_name
			]);
			echo "Deleted the object from $this->bucket.\n";
		} catch (Aws\S3\Exception\S3Exception $exception) {
			echo "Failed to delete $file_name from $this->bucket with error: " . $exception->getMessage();
			exit("Please fix error with object deletion before continuing.");
		}
	}
}
