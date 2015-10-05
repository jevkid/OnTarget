function r = doImageAnalysis(imgDir)
	contents = dir(imgDir);									% Find uploaded images from upload directory.
	for i = 3:numel(contents)								% Loop through each image.
		filename = contents(i).name;					% Get the file name of the current image.
		imgPath = [imgDir filename];					% Get the full path of the current image.
		img = imread(imgPath);								% Create image object.
		targetPos = getTargetPos(img);				% Get the position of the target in the image.
		arrows = findArrows(img);							% Find the arrows in the image.
		rings = getRings(img);								% Find the rings in the image.
		for j = 1:size(arrows,1)																%	Loop through each arrow.
			%user = getUser(users, arrows(j));										% NOTE: matlab uses matricies not arrays. Find a better way to parse x,y data
			%score = calculateScore(rings, arrows(j));						%
			%angle = calculateAngle(targetPos, arrows(j));				%
			%scores(user) = [scores(user) score ':' angle ';'];		%
		end
	end
	r = j;
end

%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%
%	Function: doImageAnalysis
%
% Called From: PHP script on website.
% Returns: An array of strings where each string is a score in CSV form.
% Assumptions: Video was successfully uploaded.
% Description: Main loop for the analysis of a video. It will iterate through each frame and detect new arrows.
% 					   Each time an arrow is detected, it's score and position is calculated and this information is
%						   added to a string of shots. Each of these strings is assigned to a user and returned to PHP.
%
% PSEUDOCODE:
%
% doImageAnalysis(images, users):
% 	for i in xrange(0,count(images)):											# Loop through images.
% 		targetPos = getTargetPos(images[i]):								# Get the position of the target in the image.
% 		arrows = findArrows(images[i]-images[i-1]):					# Returns array of dots.
% 		rings = getRings(images[i])													# Get the rings on the image.
% 		for j in xrange(0,count(arrows)):										# Loop through the array of new arrows.
%				user = getUser(users, arrows[j])									# Find the user for this arrow.
%				score = calculateScore(rings, arrows[j])					# Add the scores to the arrows string.
%				angle = calculateAngle(targetPos, arrows[j])			# Add the angles to the arrows string.
%				scores[user] += score+":"+angle+";"								# Add the score and angle to the users arrow string.
% 	return scores